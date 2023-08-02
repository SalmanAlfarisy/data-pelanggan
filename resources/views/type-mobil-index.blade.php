@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container mt-4">
        <h1>Data Type Mobil</h1>

        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a href="{{ route('type-mobil.tambahForm') }}" class="btn btn-success mb-2">Tambah Type Mobil</a>
        <table class="table table-stripped table-bordered">

            <div class="my-3 col-12 col-sm-6 col-md-4">
                <form action="" method="get">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                        <button class="input-group-text btn btn-primary">search</button>
                    </div>
                </form>
            </div>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Merk</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeMobils as $typeMobil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $typeMobil->merkMobil->nama_merk }}</td>
                        <td> {{ $typeMobil->type_mobil }}</td>
                        <td>
                            <form action="{{ route('type-mobil.hapus', $typeMobil->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data type mobil ini?')">Hapus</button>
                            </form>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
