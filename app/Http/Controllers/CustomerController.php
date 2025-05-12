<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer tidak ditemukan'], 404);
        }

        return response()->json([
            'id_customer' => $customer->id_customer,
            'name' => $customer->name,
            'phone' => $customer->phone,
        ]);
    }
}
