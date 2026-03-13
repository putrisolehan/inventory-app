@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Edit Supplier</h2>

    <div class="bg-white shadow p-6 rounded">
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4"> 
                <label class="block mb-1">Nama Supplier</label>
                <input type="text" name="name" value="{{ $supplier->name }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Alamat</label>
                <input type="text" name="address" value="{{ $supplier->address }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4"> 
                <label class="block mb-1">Telepon</label>
                <input type="text" name="phone" value="{{ $supplier->phone }}" class="w-full border rounded px-3 py-2">
            </div>

             <div class="mb-4"> 
                <label class="block mb-1">Email</label>
                <input type="text" name="email" value="{{ $supplier->email }}" class="w-full border rounded px-3 py-2">
            </div>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</div>
endsection