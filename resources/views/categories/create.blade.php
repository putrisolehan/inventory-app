@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Tambah Kategori</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Nama Kategori</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection
