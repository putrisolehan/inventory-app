@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3"> 
            <label>Nama Kategori</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>
</div>
endsection