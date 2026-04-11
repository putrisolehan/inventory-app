<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockOut;

class DashboardController extends Controller
{

public function index()
{
    
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalSuppliers = Supplier::count();
    $totalStockOut = StockOut::count();

    $recentStockOuts = StockOut::with('productSize.product')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalProducts',
        'totalCategories',
        'totalSuppliers',
        'totalStockOut',
        'recentStockOuts'
    ));


}
}
