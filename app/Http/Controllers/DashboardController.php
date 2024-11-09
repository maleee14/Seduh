<?php

namespace App\Http\Controllers;

use App\Models\BookTable;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products_count = Product::count();
        $orders_count = Order::count();
        $bookings_count = BookTable::count();

        if (auth()->user()->role == 'admin') {
            return view('admin.dashboard', compact('products_count', 'orders_count', 'bookings_count'));
        } else {
            return redirect()->route('home');
        }
    }
}
