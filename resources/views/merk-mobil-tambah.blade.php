@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container mt-4">
    <h1>Tambah Data Merk Mobil</h1>
    <form action="{{ route('merk-mobil.tambah') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_merk" class="form-label">Nama Merk Mobil:</label>
            <input type="text" class="form-control" name="nama_merk" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


@endsection
