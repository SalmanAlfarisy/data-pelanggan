@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container mt-5">
        <h1>Daftar Pelanggan</h1>

        <div class="my-3 d-flex justify-content-between">
            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Add Pelanggan</a>
            <a href="pelanggans-deleted" class="btn btn-info mb-3">Show Deleted Data</a>
        </div>


    <div class="my-3 col-12 col-sm-6 col-md-4">
        <form action="" method="get">
            <div class="input-group mb-3 ">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                <button class="input-group-text btn btn-primary">search</button>
            </div>
        </form>
    </div>


        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>No. Telepon</th>
                    <th>No. KK</th>
                    <th>Alamat</th>
                    <th>Type Mobil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->no_telpon }}</td>
                        <td>{{ $data->no_kk }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->type_mobil }}</td>
                        <td>
                            <a href="{{ route('pelanggan.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pelanggan.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $data->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-5">
        {{ $pelanggan->links() }}
    </div>
@endsection
