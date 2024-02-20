<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerProfileController extends Controller
{
    private  $customer, $orders;
    public function index()
    {
        $this->customer = Customer::find(Session::get('customer_id'));
        $this->orders = Order::where('customer_id' , Session::get('customer_id'))->get();

        return view('customer.dashboard',
            [
                'customer' => $this->customer,
                'orders' => $this->orders,

            ]);

    }
    public function editprofile($id)
    {
        $this->customer = Customer::find($id);
        $this->orders = Order::where('customer_id' , Session::get('customer_id'))->get();
        return view('customer.profile',
            [
                'customer' => $this->customer,
                'orders' => $this->orders,
            ]);
    }
    public function updateprofle(Request $request, $id)
    {

        Customer::updateProfile($id,$request);
        return redirect('/customer-dashboard')->with('message','Customer Updated Successfully');
    }

    public function order()
    {
        $this->customer = Customer::find(Session::get('customer_id'));
        $this->orders = Order::where('customer_id' , Session::get('customer_id'))->get();

        return view('customer.order', [
            'customer' => $this->customer,
            'orders' => $this->orders,
        ]);
    }

    public function orderdetail($id)
    {
        $this->customer = Customer::find(Session::get('customer_id'));
        $this->order = Order::find($id);
        return view('customer.order-detail',
            [
                'order' => $this->order,
                'customer' => $this->customer,
            ]);
    }

    public function payment()
    {
        return view('customer.payment');
    }


    public function changePassword()
    {
        return view('customer.change-password');
    }
}
