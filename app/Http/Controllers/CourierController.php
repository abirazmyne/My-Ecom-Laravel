<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        return view('admin.courier.index');
    }
    public function create( Request $request)
    {
        Courier::newCourier($request);
        return back()->with('message', 'Category info create successfully.');

    }

    public function manage()
    {
        $couriers = Courier::orderBy('created_at', 'desc')->get();
        return view('admin.courier.manage', compact('couriers'));
//        return view('admin.category.manage');
    }

    public function edit($id)
    {
        $courier = Courier::find($id);
        return view('admin.courier.edit', compact('courier'));

    }

    public function update(Request $request, $id)
    {
        Courier::updateCourier($id,$request);
        return redirect('/courier/manage')->with('message','Courier Updated Successfully');

    }

    public function delete($id)
    {
        Courier::deleteCourier($id);
        return redirect('/courier/manage')->with('message','Courier Deleted Successfully');
    }
}
