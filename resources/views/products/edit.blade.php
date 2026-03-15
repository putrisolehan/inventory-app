@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Edit Produk</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4"> 
                <label class="block mb-1">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Kategori</label>
                <select name="category_id" class="w-full border rounded px-3 py-2">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : ''}}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Supplier</label>
                <select name="supplier_id" class="w-full border rounded px-3 py-2">
                    @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        {{ $product->supplier_id == $supplier->id ? 'selected' : ''}}>
                        {{ $supplier->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Harga</label>
                <input type="text" name="price" value="{{ $product->price }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Stok</label>
                <input type="text" name="stock" value="{{ $product->stock }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Deskripsi</label>
                <textarea name="description"  class="w-full border rounded px-3 py-2">{{ $product->description }}</textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</div>
endsection