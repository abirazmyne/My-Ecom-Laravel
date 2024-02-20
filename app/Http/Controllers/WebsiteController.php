<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Session;

class WebsiteController extends Controller
{
    private  $allProducts, $newProducts, $offerProducts;
    public function index()
    {
        $this->newProducts = Product::where('product_status', 2)->orderByDesc('id')->take(8)->get();
        $this->offerProducts = Product::where('product_status', 1)->orderByDesc('id')->take(3)->get();
        $this->allProducts = Product::orderBy('updated_at', 'desc')->take(12)->get();


        return view('website.home.index', [
            'subCategories'=> SubCategory::all(),
            'brands'=> Brand::all(),
            'sliders' => Slider::where('slider_status', 1)->get(),
            'allProducts' => $this->allProducts,
            'newProducts' => $this->newProducts,
            'offerProducts' => $this->offerProducts,
        ]);
    }
    public function categoryProduct($id)
    {
        $this->categoryProducts = Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(16);
        return view('website.category.index', [ 'categoryProducts' => $this->categoryProducts]);
    }
    public function subCategoryProduct($id)
    {
        $this->subCategoryProducts = Product::where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(16);

        return view('website.subcategory.index', [ 'subCategoryProducts' => $this->subCategoryProducts]);
    }
//    public function allproducts()
//    {
//        Product::orderBy('updated_at', 'desc')->take(12)->get()->paginate(16);
//
//        return view('website.subcategory.index', [ 'allproducts' => $this->allproducts]);
//    }
    public function productDetails($id)
    {
        $this->product = Product::find($id);
        return view('website.product.index', [ 'product' => $this->product]);
    }
}
