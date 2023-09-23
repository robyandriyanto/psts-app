<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::latest()->paginate(5);
        return view('customers.index',compact('customer'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'gender' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
//
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'gender' => 'required',
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')
                        ->with('success','Data updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
                        ->with('success','Data deleted successfully');
    }
}