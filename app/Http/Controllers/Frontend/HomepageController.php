<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BookTable;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        $coffee = $products->where('category.name', 'Coffee')->take(4);
        $mainDish = $products->where('category.name', 'Main Dish')->take(3);
        $drinks = $products->where('category.name', 'Drinks')->take(3);
        $desserts = $products->where('category.name', 'Desserts')->take(3);

        $reviews = Review::orderBy('created_at', 'desc')->take(5)->get();

        return view('frontend.home', compact('mainDish', 'drinks', 'coffee', 'desserts', 'reviews'));
    }

    public function menu()
    {
        $products = Product::with('category')->get();

        $mainDish = $products->where('category.name', 'Main Dish')->take(5);
        $drinks = $products->where('category.name', 'Drinks')->take(5);
        $coffee = $products->where('category.name', 'Coffee')->take(5);
        $desserts = $products->where('category.name', 'Desserts')->take(5);

        return view('frontend.pages.menu', compact('mainDish', 'drinks', 'coffee', 'desserts'));
    }

    public function single($id)
    {
        $products = Product::find($id);

        if ($products !== null && $products->category !== null) {
            $related_product = Product::with('category')
                ->where('category_id', $products->category->id) // Assuming 'category_id' is the foreign key in the 'products' table
                ->where('id', '!=', $products->id) // Use $products->id to refer to the current product's ID
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        } else {
            abort(404);
        }

        return view('frontend.products.single', compact('products', 'related_product'));
    }

    public function bookTable(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validated['date'] > date('n/j/Y')) {
            BookTable::create([
                'user_id' => auth()->user()->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'date' => $validated['date'],
                'time' => $validated['time'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
            ]);
            session()->flash('success', 'Berhasil');
            return redirect()->route('home');
        }
        session()->flash('date', 'Invalid Date');
        return redirect()->route('home');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }
    public function blog()
    {
        return view('frontend.pages.blog');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
