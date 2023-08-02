@extends('layouts.main')

@section('title', 'Home')

@section('content')


    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    Detail Pelanggan
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pelanggan->name }}</h5>
                    <p class="card-text"><strong>NIK        :</strong> {{ $pelanggan->nik }}</p>
                    <p class="card-text"><strong>No. Telepon:</strong> {{ $pelanggan->no_telpon }}</p>
                    <p class="card-text"><strong>No. KK     :</strong> {{ $pelanggan->no_kk }}</p>
                    <p class="card-text"><strong>Alamat     :</strong> {{ $pelanggan->alamat }}</p>
                    <p class="card-text"><strong>Merk Mobil :</strong> {{ $pelanggan->merkMobil->nama_merk }}</p>
                    <p class="card-text"><strong>Type Mobil :</strong> {{ $pelanggan->typeMobil->type_mobil }}</p>
                    <br>
                    <div class="row">
                        <div class="col">
                            <strong>Foto NPWP:</strong><br>
                            <img src="{{ asset('storage/photo NPWP/' . $pelanggan->img_npwp) }}" alt="Foto NPWP" class="img-thumbnail" width="200">
                        </div>
                        <div class="col">
                            <strong>Foto KTP:</strong><br>
                            <img src="{{ asset('storage/photo KTP/' . $pelanggan->img_ktp) }}" alt="Foto KTP" class="img-thumbnail" width="200">
                        </div>
                        <div class="col">
                            <strong>Foto KK:</strong><br>
                            <img src="{{ asset('storage/photo KK/' . $pelanggan->img_kk) }}" alt="Foto KK" class="img-thumbnail" width="200">
                        </div>
                        <div class="col">
                            <strong>Foto Buku Nikah:</strong><br>
                            <img src="{{ asset('storage/photo buku nikah/' . $pelanggan->buku_nikah) }}" alt="Foto buku nikah" class="img-thumbnail" width="200">
                        </div>

                    </div>
                </div>
            </div>
        </div>


@endsection
