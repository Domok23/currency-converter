<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->only(['name', 'price', 'quantity']));

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->only(['name', 'price', 'quantity']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }


    public function destroy(Product $product)
    {
        $productName = $product->name; // Simpan nama produk
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => "Product '{$productName}' deleted successfully!",
        ]);
    }

    public function bulkDelete(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:products,id',
        ]);

        // Hapus data berdasarkan ID yang diterima
        $deletedCount = Product::whereIn('id', $request->ids)->delete();

        return redirect()->route('products.index')->with('success', "{$deletedCount} products deleted successfully.");
    }
}