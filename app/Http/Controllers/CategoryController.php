<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create( Request $request)
    {
        Category::newCategory($request);
        return back()->with('message', 'Category info create successfully.');

    }

    public function manage()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.manage', compact('categories'));
//        return view('admin.category.manage');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));

    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($id,$request);
        return redirect('/category/manage')->with('message','Category Updated Successfully');

    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/category/manage')->with('message','Category Deleted Successfully');
    }


}
