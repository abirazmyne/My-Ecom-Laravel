<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        return view('admin.unit.index');
    }
    public function create( Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message', 'Unit info create successfully.');

    }

    public function manage()
    {
        $units = Unit::orderBy('created_at', 'desc')->get();
        return view('admin.unit.manage', compact('units'));
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('admin.unit.edit', compact('unit'));

    }

    public function update(Request $request, $id)
    {
        Unit::updateUnit($id,$request);
        return redirect('/unit/manage')->with('message','Unit Updated Successfully');

    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('/unit/manage')->with('message','Unit Deleted Successfully');
    }
}
