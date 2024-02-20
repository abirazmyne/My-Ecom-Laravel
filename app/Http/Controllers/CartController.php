<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cartIndex(Request $request,$id)
    {
        $this->product = Product::find($id);

        Cart::add([
            'id'      => $id,
            'name'    => $this->product->name,
            'qty'     => $request->qty,
            'price'   => $this->product->selling_price,
            'options' => [
                'color' => $request->color,
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => $this->product->brand->name,
            ],
        ]);

        return back();

    }


    public  function show()
    {
        $this->cartProducts = Cart::content();



//        return $this->cartProducts;


        return view('website.cart.cartindex',['products' => $this->cartProducts]);
    }

    public function update($rowId, Request $request)
    {
        Cart::update($rowId, $request->qty);

        return back()->with('message', 'Quantity Updated Successfully');
    }


    public function remove($rowId)
    {
        Cart::remove($rowId);

        return back()->with('message', 'Cart Product Remove Successfully');
    }
}
