<?php

namespace App\Observers;

use App\Models\Customer;
use App\Services\CustomerDistributer;

class CustomerObserver
{
    public function __construct(protected CustomerDistributer $distributer)
    {
    }

    public function creating(Customer $customer): void
    {
        if (is_null($customer->visiting_salesman)) {
            $this->distributer->assignToLeastBusyUser($customer);
        }
    }
    public function updating(Customer $customer): void
    {
        $nullifiedUser = $customer->isDirty("visiting_salesman") && is_null($customer->visiting_salesman);

        if ($nullifiedUser) {
            $this->distributer->assignToLeastBusyUser($customer);
        }
    }
}