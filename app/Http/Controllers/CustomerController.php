<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\Customer;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers', [
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/signup');
    }

    /**
     * Store a newly created resource in storage.
     * Called on the sign-up form
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'        => "required|string|max:50|regex:/^[a-z ,.'-]+$/i",
            'last_name'         => "required|string|max:50|regex:/^[a-z ,.'-]+$/i",
            'email'             => "required|string|max:255|unique:App\Models\Customer,email",
            'password'          => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
            'password_confirmation'  => 'required|same:password',
            'cgu' => 'required|boolean'
        ]);


        $customer = Customer::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'ip'            => $request->ip()
        ]);

        $shipping_address = new ShippingAddress();
        $shipping_address->sh_country           = $request->sh_country;
        $shipping_address->sh_address           = $request->sh_address;
        $shipping_address->sh_postal_code       = $request->sh_postal_code;
        $shipping_address->sh_apartment_number  = $request->sh_apartment_number;
        $shipping_address->sh_building          = $request->sh_building;

        $billing_address = new BillingAddress();
        $billing_address->country               = $request->country;
        $billing_address->address               = $request->address;
        $billing_address->postal_code           = $request->postal_code;
        $billing_address->apartment_number      = $request->apartment_number;
        $billing_address->building              = $request->building;

        $customer->shippingAddress()->save($shipping_address);
        $customer->billingAddress()->save($billing_address);

        return redirect('/profil');
    }

    /**
    *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
    */

    public function datasForOrdering(Request $request)
    {
        $request->validate([
            'country'               => 'required', 'string', Rule::in(['France', 'Monaco']),
            'address'               => "required|string|min:8|regex:/^[a-zA-Z0-9 ,.'-]+$/i",
            'postal_code'           => "required|integer|max:5|regex:/(^[0-9]+$)+/",
            'apartment_number'      => 'nullable|integer|max:3|regex:/(^[0-9]+$)+/',
            'building'              => "nullable|string|max:40|regex:/^[a-z ,.'-]+$/i",
            'sh_country'            => 'required', 'string', Rule::in(['France', 'Monaco']),
            'sh_address'            => "required|string|min:8|regex:/^[a-zA-Z0-9 ,.'-]+$/i",
            'sh_postal_code'        => "required|integer|max:5|regex:/(^[0-9]+$)+/",
            'sh_apartment_number'   => 'nullable|integer|max:3|regex:/(^[0-9]+$)+/',
            'sh_building'           => "nullable|string|max:40|regex:/^[a-z ,.'-]+$/i",
            'mobile_phone'          => 'nullable|unique:App\Models\Customer,mobile_phone|regex:/(^[0-9]+$)+/',
            'home_phone'            => 'nullable|unique:App\Models\Customer,home_phone|regex:/(^[0-9]+$)+/',
            'id'                    => 'required|integer',
        ]);

        if($request->building || $request->apartment_number != NULL)
        {
            if ($request->building || $request->apartment_number = NULL)
            {
                return redirect()->back()->with('msg', 'Numéro d\'appartement ou bâtiment non défini');
            }
        }

        $id = $request->id;

        $customer = Customer::findOrFail($id);

        $customerData = [
            'mobile_phone'  => $request->mobile_phone,
            'home_phone'    => $request->home_phone,
        ];

        $billingAddress = [
            'country'           => $request->country,
            'address'           => $request->address,
            'postal_code'       => $request->postal_code,
            'apartment_number'  => $request->apartment_number,
            'building'          => $request->building,
        ];

        $shippingAddress = [
            'sh_country'            => $request->sh_country,
            'sh_address'            => $request->sh_address,
            'sh_postal_code'        => $request->sh_postal_code,
            'sh_apartment_number'   => $request->sh_apartment_number,
            'sh_building'           => $request->sh_building,
        ];

        $customer->update($customerData);
        $customer->billingAddress()->save($billingAddress);
        $customer->shippingAddress()->save($shippingAddress);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages/customer_profil', [
            'customer' => Customer::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
