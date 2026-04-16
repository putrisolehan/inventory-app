<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIn;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Supplier;
use App\Exports\StockInExport;
use Maatwebsite\Excel\Facades\Excel;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = StockIn::with('product','productSize','supplier');

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

        $stockIns = $query->orderBy('date', 'desc')->get();

        return view('stock_ins.index', compact('stockIns'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $productSizes = ProductSize::all();
        $suppliers = Supplier::all();

        return view('stock_ins.create', compact('products', 'productSizes', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'product_size_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required|integer',
            'date' => 'required|date',
        ]);

        StockIn::create($request->all());

        $productSize = ProductSize::find($request->product_size_id);
        $productSize->stock += $request->qty;
        $productSize->save();

        return redirect()->route('stock-in.index')->with('success','Stock berhasil ditambahkan!');
    }

    public function export(Request $request)
    {
        return Excel::download(new StockInExport($request), 'stock-in.xlsx');
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
