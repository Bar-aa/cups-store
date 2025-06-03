<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cup_id', 'rating', 'comment'];

    public function cup()
    {
        return $this->belongsTo(Cup::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
