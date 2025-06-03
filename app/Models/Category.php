<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cups()
    {
        return $this->hasMany(Cup::class);
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Category added successfully');
}
}

