@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Hapus Data Pelanggan
        </div>
        <div class="card-body">
            <h5 class="card-title">Apakah Anda yakin ingin menghapus data pelanggan ini?</h5>
            <p class="card-text"><strong>Nama:</strong> {{ $pelanggan->name }}</p>
            <p class="card-text"><strong>NIK:</strong> {{ $pelanggan->nik }}</p>
            <p class="card-text"><strong>No. Telepon:</strong> {{ $pelanggan->no_telpon }}</p>
            <p class="card-text"><strong>No. KK:</strong> {{ $pelanggan->no_kk }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p class="card-text"><strong>Type Mobil:</strong> {{ $pelanggan->type_mobil }}</p>

            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
<!-- Masukkan link JS Bootstrap terbaru -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection
