@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Edit Kategori</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4"> 
                <label class="block mb-1">Nama Kategori</label>
                <input type="text" name="name" value="{{ $category->name }}" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</div>
endsection