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
}