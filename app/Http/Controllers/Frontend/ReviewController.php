<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Cup;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $cupId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $cup = Cup::findOrFail($cupId);

        // تحقق إذا المستخدم قيم هذا الكوب من قبل (اختياري)
        $existingReview = Review::where('user_id', Auth::id())->where('cup_id', $cupId)->first();
        if ($existingReview) {
            return back()->with('error', 'لقد قمت بتقييم هذا المنتج من قبل.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'cup_id' => $cupId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('cups.show', $cupId)->with('success', 'تم إضافة تقييمك بنجاح.');
    }
}
