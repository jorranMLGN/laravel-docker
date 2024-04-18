<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        if (Auth::check()) {
        $user = Auth::user(); // Get the currently authenticated user
        $role = $user->role; // Get the role of the currently authenticated user
        return view('products.index', compact('products', 'role'));
    } else {
        // Handle the case where no user is authenticated
        // For example, redirect to the login page
            return view('products.index', compact('products'));

        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('Success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }


    public function create()
    {
        return view('products.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $product = Product::find($id);
    $product->delete();
    return redirect()->route("products.index")
        ->with('success', 'Product deleted successfully.');
    }
}
