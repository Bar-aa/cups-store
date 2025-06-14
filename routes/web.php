<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CupController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Session;

// ✅ تغيير اللغة
Route::get('/locale/switch', function () {
    $locale = request('lang');
    $availableLocales = ['en', 'ar']; 

    if (in_array($locale, $availableLocales)) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('locale.switch');

// ✅ الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ لوحة التحكم الإدارية
Route::middleware(['auth', 'auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard'); 
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::get('cups', [App\Http\Controllers\Admin\AdminCupController::class, 'index'])->name('cups.index');
    Route::get('cups/create', [App\Http\Controllers\Admin\AdminCupController::class, 'create'])->name('cups.create');
    Route::post('cups', [App\Http\Controllers\Admin\AdminCupController::class, 'store'])->name('cups.store');
    Route::get('cups/{cup}/edit', [App\Http\Controllers\Admin\AdminCupController::class, 'edit'])->name('cups.edit');
    Route::put('cups/{cup}', [App\Http\Controllers\Admin\AdminCupController::class, 'update'])->name('cups.update');
    Route::delete('cups/{cup}', [App\Http\Controllers\Admin\AdminCupController::class, 'destroy'])->name('cups.destroy');
    Route::resource('orders', \App\Http\Controllers\Admin\AdminOrderController::class);
});


// ✅ صفحة الأكواب
Route::prefix('cups')->group(function () {
    Route::get('/', [CupController::class, 'index'])->name('cups.index');
    Route::get('/{id}', [CupController::class, 'show'])->name('cups.show');
    Route::post('/{cup}/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
});

// ✅ صفحة السلة
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->middleware('auth')->name('cart');
    Route::post('/add/{id}', [CartController::class, 'add'])->middleware('auth')->name('cart.add');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// ✅ صفحة الدفع
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

// ✅ الصفحات الثابتة
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ✅ الملف الشخصي (بعد تسجيل الدخول)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ✅ تسجيل الدخول والتسجيل من Breeze
require __DIR__ . '/auth.php';
