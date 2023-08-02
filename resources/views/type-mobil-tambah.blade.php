@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container mt-4">
    <h1>Tambah Data Type Mobil</h1>
    <form action="{{ route('type-mobil.tambah') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="merk_id" class="form-label">Merk Mobil:</label>
            <select class="form-select" name="merk_id" required>
                <option value="" selected disabled>Pilih Merk Mobil</option>
                @foreach ($merkMobils as $merkMobil)
                    <option value="{{ $merkMobil->id }}">{{ $merkMobil->nama_merk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_mobil" class="form-label">Type Mobil:</label>
            <input type="text" class="form-control" name="type_mobil" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
