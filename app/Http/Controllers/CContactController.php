<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CContactController extends Controller
{
    public function contIndex()
    {
        return view('website.cuscontact.index');
    }
}
