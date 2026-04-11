<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($productId)
    {
    $productSizes = ProductSize::with('product')
        ->where('product_id', $productId)
        ->get();

    $product = Product::findOrFail($productId);

    return view('product_sizes.index', compact('productSizes', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('product_sizes.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'product_id' => 'required',
        'size' => 'required|array'
    ]);

    foreach ($request->size as $i => $size) {
        if ($size != null) {
            ProductSize::create([
                'product_id' => $request->product_id,
                'size' => $size,
            ]);
        }
    }

    return redirect()->route('product-sizes.index', $request->product_id)
    ->with('success', 'Size berhasil ditambahkan');
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
    public function edit($id)
    {
        $productSize = ProductSize::findOrFail($id);
        $products = Product::all();

        return view('product_sizes.edit', compact('productSize','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'product_id' => 'required',
        'size' => 'required'
        ]);

        $productSize = ProductSize::findOrFail($id);

        $productSize->update([
            'product_id' => $request->product_id,
            'size' => $request->size
        ]);

        return redirect()->route('product-sizes.index', $productSize->product_id)
            ->with('success', 'Size berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productSize = ProductSize::findOrFail($id);

        $productId = $productSize->product_id;

        $productSize->delete();

        return redirect()->route('product-sizes.index', $productId);
    }
}
