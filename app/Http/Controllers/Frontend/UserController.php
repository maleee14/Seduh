<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BookTable;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function myOrder()
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.users.my-order', compact('order'));
    }

    public function myBook()
    {
        $book = BookTable::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.users.my-book', compact('book'));
    }

    public function createReview()
    {
        return view('frontend.users.create-review');
    }
    public function storeReview(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job_title' => 'required',
            'message' => 'required',
        ]);

        Review::create([
            'name' => $request->name,
            'job_title' => $request->job_title,
            'message' => $request->message,
        ]);

        session()->flash('success', 'Review Berhasil Ditambahkan');
        return redirect()->route('my.review');
    }

    public function myReview()
    {
        $review = Review::where('name', auth()->user()->name)->get();

        return view('frontend.users.my-review', compact('review'));
    }
}
