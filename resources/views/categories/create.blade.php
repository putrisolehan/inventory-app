@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>
</div>
@endsection
