@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h1>Halaman Home</h1>





<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pelanggan</title>
    <!-- Masukkan link CSS Bootstrap terbaru -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Edit Data Pelanggan
            </div>
            <div class="card-body">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $pelanggan->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $pelanggan->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon">No. Telepon</label>
                        <input type="tel" class="form-control" id="no_telpon" name="no_telpon" value="{{ $pelanggan->no_telpon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_kk">No. KK</label>
                        <input type="number" class="form-control" id="no_kk" name="no_kk" value="{{ $pelanggan->no_kk }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pelanggan->alamat }}</textarea>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="photo">Foto NPWP</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo" data-browse="Pilih file" value="">Pilih file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo2">Foto KTP</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo2" name="photo2">
                            <label class="custom-file-label" for="photo2" data-browse="Pilih file">Pilih file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo3">Foto KK</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo3" name="photo3">
                            <label class="custom-file-label" for="photo3" data-browse="Pilih file">Pilih file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo4">Foto Buku Nikah</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo4" name="photo4">
                            <label class="custom-file-label" for="photo4" data-browse="Pilih file">Pilih file</label>
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label for="type_mobil">Type Mobil</label>
                        <select class="form-control" id="type_mobil" name="type_mobil">
                            <option value="Sedan" {{ $pelanggan->type_mobil === 'Sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="SUV" {{ $pelanggan->type_mobil === 'SUV' ? 'selected' : '' }}>SUV</option>
                            <option value="MPV" {{ $pelanggan->type_mobil === 'MPV' ? 'selected' : '' }}>MPV</option>
                            <option value="Truk" {{ $pelanggan->type_mobil === 'Truk' ? 'selected' : '' }}>Truk</option>
                            <!-- Tambahkan pilihan lain sesuai kebutuhan -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Masukkan link JS Bootstrap terbaru -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
