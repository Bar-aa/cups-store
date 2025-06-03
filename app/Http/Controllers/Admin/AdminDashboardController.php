<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Cup;
use App\Models\Review;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'orderCount' => Order::count(),
            'cupCount' => Cup::count(),
            'reviewCount' => Review::count(),
            'categoryCount'=> Category::count(), 
        ]);
    }
}
