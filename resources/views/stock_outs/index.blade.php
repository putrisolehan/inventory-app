@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Barang Keluar</h2>

            <a href="{{ route('stock-out.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Kurangi Stok
            </a>
        </div>

        <form method="GET" action="">
            <div class="flex gap-2 mb-4">

                <input type="date" name="start_date"
                    value="{{ request('start_date') }}"
                    class="border p-2 rounded">

                <input type="date" name="end_date"
                    value="{{ request('end_date') }}"
                    class="border p-2 rounded">

                <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                    Filter
                </button>

            </div>
        </form>

        <div class="bg-white shadow rounded-lg p-5">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Produk</th>
                        <th class="p-2 border">Size</th>
                        <th class="p-2 border">Quantity</th>
                        <th class="p-2 border">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($stockOuts as $stock)
                    <tr class="text-center">
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $stock->productSize->product->name ?? '-' }}</td>
                        <td class="p-2 border">{{ $stock->productSize->size ?? '-' }}</td>
                        <td class="p-2 border">{{ $stock->qty }}</td>
                        <td class="p-2 border">{{ $stock->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('stock-out.export', request()->query()) }}"
    class="bg-green-500 text-white px-3 py-2 rounded">
    Export Excel
    </a>
</div>
@endsection