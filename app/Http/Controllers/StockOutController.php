<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockOuts = StockOut::with('productSize.product')->get();
        return view('stock_outs.index', compact('stockOuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productSizes = ProductSize::with('product')
        ->has('product')
        ->get();
        return view('stock_outs.create', compact('productSizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_size_id' => 'required',
            'qty' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $productSize = ProductSize::findOrFail($request->product_size_id);

        if($productSize->stock < $request->qty) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        $productSize->stock -= $request->qty;
        $productSize->save();

        StockOut::create($request->all());

        return redirect()->route('stock-out.index')->with('success', 'Stock berhasil dikurangi!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
