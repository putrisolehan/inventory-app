@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Edit Size</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('product-sizes.update', $productSize->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4"> 
                <label class="block mb-1">Nama Produk</label>
                <select name="product_id">
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                    {{ $product->id == $productSize->product_id ? 'selected' : '' }}>
                    {{ $product->name }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Size</label>
                <input type="text" name="size" value="{{ $productSize->size }}" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</div>
endsection