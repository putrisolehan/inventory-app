<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockOut;
use App\Models\ProductSize;
use App\Exports\StockOutExport;
use Maatwebsite\Excel\Facades\Excel;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = StockOut::with('product','productSize','supplier');

       if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        } else {
            if ($request->filled('start_date')) {
                $query->whereDate('date', '>=', $request->start_date);
            }

            if ($request->filled('end_date')) {
                $query->whereDate('date', '<=', $request->end_date);
            }
        }

        $stockOuts = $query->orderBy('date', 'desc')->get();

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

    public function exportOut(Request $request)
    {
        return Excel::download(new StockOutExport($request), 'stock-out.xlsx');
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
