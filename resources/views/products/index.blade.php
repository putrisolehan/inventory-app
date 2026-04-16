@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Produk</h2>

            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Tambah Produk
            </a>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="mb-4 flex gap-2">
            <input 
            type="text"
            name="search"
            placeholder="Cari produk..."
            value="{{ request('search') }}"
            class="border p-2 rounded"
            >

            <select name="category" class="border p-2 rounded">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(request()->get('category') == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Cari
            </button>
        </form>

        <div class="bg-white shadow rounded-lg p-5">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Supplier</th>
                        <th class="p-2 border">Harga</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr class="text-center">
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $product->name }}</td>
                        <td class="p-2 border">{{ $product->category->name }}</td>
                        <td class="p-2 border">{{ $product->supplier->name }}</td>
                        <td class="p-2 border">{{ $product->price }}</td>
                        <td class="p-2 border">

                            <a href="{{ route('products.edit',$product->id) }}"
                            class="bg-yellow-400 px-3 py-1 rounded">
                            Ubah
                            </a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    class="inline">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm"
                                onclick="return confirm('Delete this product?')">
                                Hapus
                                </button>
                            </form>

                            <a href="{{ route('product-sizes.index', $product->id) }}"
                            class="bg-blue-400 px-3 py-1 rounded">
                            Detail size
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
            {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection