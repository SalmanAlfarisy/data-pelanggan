@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container mt-4">
        <h1>Data Merk Mobil</h1>

        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a href="{{ route('merk-mobil.tambahForm') }}" class="btn btn-success mb-2">Tambah Merk Mobil</a>
        <ul class="list-group">
            @foreach ($merkMobils as $merkMobil)
                <li class="list-group-item">
                    {{ $merkMobil->nama_merk }}
                    <div class="float-end">
                        <form action="{{ route('merk-mobil.hapus', $merkMobil->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data merk mobil ini?')">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
