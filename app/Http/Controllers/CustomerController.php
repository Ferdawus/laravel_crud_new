<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new customer();
        $customer->customer_name    = $request->customer_name;
        $customer->customer_phone   = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->save();
        return redirect()->route('customer.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        $customer->customer_name    = $request->customer_name;
        $customer->customer_phone   = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->update();
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
