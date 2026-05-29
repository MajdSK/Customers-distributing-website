<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function MakeVisited(Customer $customer)
    {
        $customer->update(["visited" => 1]);
        return redirect()->back();
    }
    public function addNewCustomer(Request $request)
    {
        Customer::create([
            'name' => request("CustomerName"),
            'address' => request('CustomerAddress'),
            'visited' => false,
            'visiting_salesman' => null
        ]);
        return redirect('/');
    }
    public function DelCustomer(Customer $customer)
    {
        $customer->delete();
        return redirect()->back();
    }
}