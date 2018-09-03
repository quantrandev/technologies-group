<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('is_active', '=', true)->get();
        return view('client.customer.index')->with([
            'customers' => $customers
        ]);
    }
}
