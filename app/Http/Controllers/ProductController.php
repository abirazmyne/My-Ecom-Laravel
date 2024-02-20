<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\OtherImages;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product, $products;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add',[
            'categories'=> Category::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'=> Brand::all(),
            'units'=> Unit::all(),
        ]);
    }

    public function getSubcategoryByCategory()
    {
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->product = Product::newProduct($request);
        OtherImages::newOtherImage($request->file('other_image'), $this->product->id);
        return back()->with('message', 'Product Info create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',
        [
            'categories'=> Category::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'=> Brand::all(),
            'units'=> Unit::all(),
            'product'=> $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request, $product->id);
        if ($request->file('other_image'))
        {
            OtherImages::updateOtherImage($request->file('other_image'), $product->id);
        }
        return redirect('/product')->with('message', 'Product info updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product->id);
        OtherImages::deleteOtherImage($product->id);
        return redirect('/product')->with('message', 'Product info delete successfully');
    }
}
