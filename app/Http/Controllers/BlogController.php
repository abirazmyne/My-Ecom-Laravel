<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blgIndex()
    {
        return view('website.webblog.index');
    }
}
