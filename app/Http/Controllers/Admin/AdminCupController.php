<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cup;
use Illuminate\Http\Request;

class AdminCupController extends Controller
{
    public function index()
    {
        $cups = Cup::latest()->paginate(10);
        return view('admin.cups.index', compact('cups'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.cups.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/cups'), $imageName);
            $imagePath = 'uploads/cups/' . $imageName;
        }

        Cup::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description ?? null,
            'stock' => $request->stock ?? 0,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.cups.index')->with('success', 'Cup added successfully');
    }

    public function edit(Cup $cup)
    {
        $categories = Category::all();
        return view('admin.cups.edit', compact('cup', 'categories'));
    }

    public function update(Request $request, Cup $cup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $cup->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/cups'), $imageName);
            $imagePath = 'uploads/cups/' . $imageName;
        }

        $cup->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description ?? null,
            'stock' => $request->stock ?? 0,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.cups.index')->with('success', 'Cup updated successfully');
    }

}

