<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cup;

class CupController extends Controller
{
    public function index()
    {
        $cups = Cup::with('category')->get();
        return view('frontend.cups.index', compact('cups'));
    }

    public function show($id)
    {
        $cup = Cup::with('category', 'reviews.user')->findOrFail($id);
        return view('frontend.cups.show', compact('cup'));
    }
}
