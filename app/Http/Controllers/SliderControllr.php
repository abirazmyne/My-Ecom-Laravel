<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderControllr extends Controller
{
    public function index()
    {
        return view('admin.slider.index');
    }
    public function create( Request $request)
    {
        Slider::newSlider($request);
        return back()->with('message', 'Slider info create successfully.');

    }

    public function manage()
    {
        $this->sliders = Slider::orderBy('created_at', 'desc')->get();
        return view('admin.slider.manage', ['sliders' =>  $this->sliders]);
    }

    public function edit($id)
    {
        $this->slider = Slider::find($id);
        return view('admin.slider.edit', ['slider' =>  $this->slider]);

    }

    public function update(Request $request, $id)
    {
        Slider::updateSlider($id,$request);
        return redirect('/slider/manage')->with('message','Slider  Updated Successfully');

    }

    public function delete($id)
    {
        Slider::deleteSlider($id);
        return redirect('/slider/manage')->with('message','Category Deleted Successfully');
    }
}
