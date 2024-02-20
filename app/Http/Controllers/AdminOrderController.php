<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class AdminOrderController extends Controller
{
    private $orders, $order, $product, $orderDetails, $pdf;

    public function index()
    {
        $this->orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', ['orders' => $this->orders ]);

    }

    public function details($id)
    {
        $order = Order::find($id);
        return view('admin.order.order-detail', compact('order'));

    }

    public function edit($id)
    {

        if (Order::find($id)->order_status == 'Complete')
        {
            return back()->with('message' ,'Sorry .. You can not edit this order');
        }

        else
        {
            $this->order = Order::find($id);
            return view('admin.order.order-edit', [
                'order' => $this->order,
                'couriers' => Courier::all(),
            ]);
        }



    }

    public function update(Request $request,$id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'Pending')
        {
            $this->order->order_status = $request->order_status;
        }
        elseif ($request->order_status == 'Cancel')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;

        }
        elseif ($request->order_status == 'Processing')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->payment_status = $request->order_status;
            $this->order->courier_id = $request->courier_id;

            foreach ($this->order->orderDetail as $item)
            {
                $this->product = Product::find($item->product_id);
                $this->product->stock_amount = $this->product->stock_amount - $item->product_qty ;
                $this->product->save();
            }

        }
        elseif ($request->order_status == 'Complete')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->payment_amount = $this->order->total_payable;

        }
        $this->order->save();
        return redirect('/order/all')->with('message', 'Order info update successfully');

    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('admin.order.order-invoice', compact('order'));
    }

    public function downloadinvoice($id)
    {
        $this->order = Order::find($id);
        $pdf = PDF::loadView('admin.order.download-invoice', ['order' => $this->order]);
        return $pdf->stream('invoice-'. $id . '.pdf');


    }

    public function delete($id)
    {
        if (Order::find($id)->order_status == 'Cancel')
        {
            Order::deleteOrder($id);
            OrderDetail::deleteOrderDetail($id);

            return back()->with('message' ,'Order Delete Successfully');
        }

        else
        {
            return back()->with('message' ,'Sorry .. This order can not be deleted');
        }

    }

//    public function pdelete($id)
//    {
//        return
//        $orderDetails = OrderDetail::where('product_id', $id)->get();
//        foreach ($orderDetails as $orderDetail) {
//            if(file_exists($orderDetail->product_image))
//            {
//                unlink($orderDetail->product_image);
//            }
//            $orderDetail->delete();
//        }
//        return redirect('/order/all');
//
//
//    }
}
