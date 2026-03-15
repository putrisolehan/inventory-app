@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Products</h2>

            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Tambah Product
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Supplier</th>
                        <th class="p-2 border">Harga</th>
                        <th class="p-2 border">Stok</th>
                        <th class="p-2 border">Deskripsi</th>
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
                        <td class="p-2 border">{{ $product->stock }}</td>
                        <td class="p-2 border">{{ $product->description }}</td>

                        <td class="p-2 border">

                            <a href="{{ route('products.edit',$product->id) }}"
                            class="bg-yellow-400 px-3 py-1 rounded">
                            Edit
                            </a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}"
                                    method="POST"
                                    class="inline">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection