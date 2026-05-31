<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Customer;
use App\Services\CustomerDistributer;

class UserObserver
{
    public function __construct(protected CustomerDistributer $distributer)
    {
    }
    public function created(User $user): void
    {
        $this->distributer->rebalanceOrphanCustomers();
    }

    public function deleted(User $user): void
    {
        $this->distributer->rebalanceOrphanCustomers();
    }
    public function updated(User $user): void
    {
        $becameAdmin = $user->wasChanged('is_admin') && $user->is_admin == 1;
        $becameUnavailable = $user->wasChanged('availability') && $user->availability == 0;
        $becameUnverified = $user->wasChanged('verified') && $user->verified == 0;

        if ($becameAdmin || $becameUnavailable || $becameUnverified) {
            Customer::where('visited', false)->where('visiting_salesman', $user->id)->update([
                'visiting_salesman' => null
            ]);

            $this->distributer->rebalanceOrphanCustomers();
        }

        $becameEligibleSalesman = $user->wasChanged('availability') && $user->availability == 1 && $user->is_admin == 0;

        if ($becameEligibleSalesman) {
            $this->distributer->rebalanceOrphanCustomers();
        }
    }
}