@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl font-bold">Product Size - {{ $product->name }}</h2>

            <a href="{{ route('product-sizes.create', $product->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Tambah Size
            </a>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <table class="w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Product</th>
                        <th class="p-2 border">Size</th>
                        <th class="p-2 border">Stok</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productSizes as $size)
                    <tr class="text-center">
                        <td class="p-2 border">{{ $loop->iteration }}</td>
                        <td class="p-2 border">{{ $size->product->name }}</td>
                        <td class="p-2 border">{{ $size->size }}</td>
                        <td class="p-2 border">{{ $size->stock }}</td>

                        <td class="p-2 border">

                            <a href="{{ route('product-sizes.edit',$size->id) }}"
                            class="bg-yellow-400 px-3 py-1 rounded">
                            Edit
                            </a>
                            
                            <form action="{{ route('product-sizes.destroy', $size->id) }}"
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