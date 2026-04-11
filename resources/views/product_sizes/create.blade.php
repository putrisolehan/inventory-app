@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Tambah Size</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('product-sizes.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nama Produk</label>
                <select name="product_id">
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div id="size-container">
                <div class="flex gap-2 mb-2">
                    <input type="number" name="size[]" class="w-1/2 border rounded px-3 py-2" placeholder="Size">
                </div>
            </div>

            <button type="button" onclick="addRow()"
                class="mb-4 bg-gray-500 text-white px-3 py-1 rounded">
                + Tambah Size
            </button>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>

<script>
    function addRow() {
        let container = document.getElementById('size-container');

        let row = `
            <div class="flex gap-2 mb-2">
                <input type="number" name="size[]" placeholder="Size"
                    class="w-1/2 border rounded px-3 py-2">
            </div>
        `;

        container.insertAdjacentHTML('beforeend', row);

    }
</script>
@endsection