<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use  Session;

class CustomerAuthController extends Controller
{
    public $customer;

    public function index()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $this->customer = Customer::where('email', $request->email_mobile)->orWhere('mobile', $request->email_mobile)->first();

        if ($this->customer )
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/customer-dashboard');

            }
            else
            {
                return back()->with('message', 'Your password is invalid !');

            }

        }
        else
        {
            return back()->with('message', 'Your email or mobile number is invalid !');
        }
    }

    public function register()
    {
        return view('customer.register');

    }

    public function newCustomer(Request $request)
    {

        $this->customer = Customer::where('email', $request->email)->orWhere('mobile', $request->mobile)->first();

         if (! $this->customer )
        {
            $this->customer = Customer::newCustomer($request);
            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);

            return redirect('/customer-dashboard');

        }

        else
        {
            return back()->with('message' , 'Email or Phone already used');
        }

    }


    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
