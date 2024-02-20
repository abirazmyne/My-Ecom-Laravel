<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use Cart;

class CheckoutController extends Controller
{
    public  $customer,$order, $product, $description, $image, $directory, $imageName, $imageUrl;

    public function checkoutIndex()
    {
        if (Session::get('customer_id')) {

            $this->customer = Customer::find(Session::get('customer_id'));

        }
        else
        {
            $this->customer = '';
        }
        return view('website.checkout.checkoutindex',['customer' => $this->customer]);
    }

    public  function getImageUrl($request)
    {
        $this->image         = $request->file('image');
        $this->imageName     = $this->image->getClientOriginalName();
        $this->directory     = 'upload/customer-images/';
        $this->image->move( $this->directory,  $this->imageName);
        $this->imageUrl =  $this->directory. $this->imageName;
        return $this->imageUrl;
    }


    public function newOrder(Request $request)
    {

        if (Session::get('customer_id'))

        {
            $this->customer = Customer::find(Session::get('customer_id')) ;
        }

        else
        {
            $this->imageUrl = $this->getImageUrl($request);
            $this->customer =  Customer::where('email',$request->email)->orWhere('mobile', $request->mobile)->first();
            if(! $this->customer)
            {
                $this->customer = new Customer();
                $this->customer->name      =  $request->name;
                $this->customer->email     = $request->email;
                $this->customer->mobile    = $request->mobile;
                $this->customer->address    = $request->address;
                $this->customer->post_code  = $request->post_code;
                $this->customer->image     = $this->imageUrl;
                $this->customer->password  = bcrypt($request->mobile);
                $this->customer->save();
            }

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }




        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->total_payable = Session::get('product_total') + $request->shippingcost;
        $this->order->order_total = Session::get('product_total');
        $this->order->tax_total   = Session::get('tax_total');
        $this->order->shipping_total = $request->shippingcost;
        $this->order->delivery_address = $request->address;
        $this->order->post_code = $request->post_code;
        $this->order->payment_method = $request->payment_method;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime('Y-n-d');

        if ($request->payment_method == 'Online')
        {
            $this->order->transaction_id = uniqid();

        }

        $this->order->save();


        foreach (Cart::content() as $item)
        {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name = $item->name;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty = $item->qty;
            $this->orderDetail->product_image = $item->options->image;
            $this->orderDetail->save();

            $this->product = Product::find($item->id);
            $this->product->sales_count = $this->product->sales_count +1 ;
            $this->product->save();

            Cart::remove($item->rowId);

        }

        if ($request->payment_method == 'Cash')
        {
            return redirect('/complete-detail')->with('message', 'Congratulation ! Your order has been successfully done');
        }

        else
        {

            $post_data = array();
            $post_data['total_amount'] = $this->order->total_payable; # You cant not pay less than 10
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = $this->order->transaction_id; // tran_id must be unique

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = $this->customer->name;
            $post_data['cus_email'] = $this->customer->email;
            $post_data['cus_add1'] = 'Customer Address';
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = "";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = $this->customer->mobile;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1'] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_phone'] = "";
            $post_data['ship_country'] = "Bangladesh";

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Computer";
            $post_data['product_category'] = "Goods";
            $post_data['product_profile'] = "physical-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";


            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }



    }


    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
