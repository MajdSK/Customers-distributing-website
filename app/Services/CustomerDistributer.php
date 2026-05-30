<?php
namespace App\Services;

use App\Models\User;
use App\Models\Customer;

class CustomerDistributer
{
  public function assignToLeastBusyUser(Customer $customer): void
  {
    $minCount = User::where("is_admin", 0)
      ->where('availability', 1)->where("verified", 1)->withCount('customers')->get()->min('customers_count') ?? 0;

    $candidateUsers = User::withCount('customers')
      ->where("is_admin", 0)
      ->where('availability', 1)
      ->where("verified", 1)
      ->having('customers_count', '=', $minCount)
      ->get();

    if ($candidateUsers->isNotEmpty()) {
      $randomChoice = $candidateUsers->random();
      $customer->visiting_salesman = $randomChoice->id;
      $randomChoice->availability = false;
      $randomChoice->save();
    }
  }
  public function rebalanceOrphanCustomers(): void
  {
    // Find any customers left unassigned
    $orphans = Customer::whereNull('visiting_salesman')->get();

    foreach ($orphans as $customer) {
      $this->assignToLeastBusyUser($customer);
      $customer->save();
    }
  }
}