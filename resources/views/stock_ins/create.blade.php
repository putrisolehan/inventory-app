@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Tambah Stok</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('stock-in.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Produk</label>
                <select name="product_id">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Size</label>
                <select name="product_size_id">
                    @foreach($productSizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }} (Stock: {{ $size->stock }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Supplier</label>
                <select name="supplier_id">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Quantity</label>
                <input type="number" name="qty" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tanggal</label>
                <input type="date" name="date" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection