<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create( Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message', 'Brand info create successfully.');

    }

    public function manage()
    {
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.brand.manage', compact('brands'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));

    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($id,$request);
        return redirect('/brand/manage')->with('message','Brand Updated Successfully');

    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/brand/manage')->with('message','Brand Deleted Successfully');
    }
}
