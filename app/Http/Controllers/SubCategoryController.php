<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $categories, $subCategory, $subCategories;

    public function index()
    {
        $this->categories = Category::all();
        return view('admin.subcategory.index',['categories'=>$this->categories]);
    }

    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'New Sub-Category created Successfully.');
    }

    public function edit($id)
    {
        $this->subCategory = SubCategory::find($id);
        $this->categories = Category::all();
        return view('admin.subcategory.edit',[
            'subCategory'=> $this->subCategory,
            'categories'=>$this->categories]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($id,$request);
        return redirect('/subCategory/manage')->with('message','Category Updated Successfully');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/subCategory/manage')->with('message','Sub Category Deleted Successfully');
    }

    public function manage()
    {
        $subCategories = SubCategory::orderBy('created_at', 'desc')->get();
        return view('admin.subcategory.manage', compact('subCategories'));
    }
}
