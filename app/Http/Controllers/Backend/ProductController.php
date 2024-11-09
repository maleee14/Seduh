<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    public function data()
    {
        $product = Product::leftJoin('categories', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.name as category')
            ->get();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('image', function ($product) {
                $url = asset('storage/' . $product->image);
                return '<img src="' . $url . '" border="0" width="100" height="75"  align="center" />';
            })
            ->addColumn('price', function ($product) {
                return format_uang($product->price);
            })
            ->addColumn('description', function ($product) {
                return '<p>' . implode(' ', array_slice(explode(' ', $product->description), 0, 10)) . '...</p>';
            })
            ->addColumn('action', function ($product) {
                return '
                <div style="display: flex; justify-content: center;">
                    <a href="' . route('products.edit', $product->id) . '" class="btn btn-sm btn-info">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <form method="POST" action="' . route('products.destroy', $product->id) . '" style="display: inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['action', 'image', 'description'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::where('name', $request->category)->first();

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->put($path, file_get_contents($file));

        Product::create([
            'name' => $request->name,
            'category_id' => $category->id,
            'price' => $request->price,
            'image' => $path,
            'description' => $request->description,

        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $category = Category::where('name', $request->category)->first();

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'sometimes|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->put($path, file_get_contents($file));

            // Optionally, delete the old image file
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $path;
        }

        $product->description = $request->description;
        $product->category_id = $category->id;
        $product->update();

        session()->flash('success', 'Produk Berhasil Diupdate');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        session()->flash('delete', 'Produk Berhasil Dihapus');
        return redirect()->route('products.index');
    }
}
