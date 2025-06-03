<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cup;

class HomeController extends Controller
{
    public function index()
    {
        $cups = Cup::take(3)->get(); 
        return view('frontend.home', compact('cups'));
    }
}
