
@extends('layouts.app')

@section('content')

    <div class="bg-white shadow p-6 mb-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </div>

    <div class="p-6">

        <!-- CARD -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-blue-500 text-white p-5 rounded shadow hover:shadow-lg transition ">
                <h2>Total Produk</h2>
                <p class="text-3xl font-bold">{{ $totalProducts }}</p>
            </div>

            <div class="bg-green-500 text-white p-5 rounded shadow hover:shadow-lg transition">
                <h2>Total Kategori</h2>
                <p class="text-3xl font-bold">{{ $totalCategories }}</p>
            </div>

            <div class="bg-yellow-500 text-white p-5 rounded shadow hover:shadow-lg transition">
                <h2>Total Supplier</h2>
                <p class="text-3xl font-bold">{{ $totalSuppliers }}</p>
            </div>

            <div class="bg-red-500 text-white p-5 rounded shadow hover:shadow-lg transition">
                <h2>Stock Out</h2>
                <p class="text-3xl font-bold">{{ $totalStockOut }}</p>
            </div>

        </div>

        <!-- TABLE -->
        <div class="mt-8 bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Stock Out Terbaru</h2>

            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Produk</th>
                        <th class="p-2">Size</th>
                        <th class="p-2">Qty</th>
                        <th class="p-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentStockOuts as $stock)
                    <tr class="text-center border-t">
                        <td class="p-2">
                            {{ $stock->productSize->product->name ?? '-' }}
                        </td>
                        <td>{{ $stock->productSize->size }}</td>
                        <td>{{ $stock->qty }}</td>
                        <td>{{ $stock->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

