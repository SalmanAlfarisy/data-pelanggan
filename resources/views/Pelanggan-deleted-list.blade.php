@extends('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Detail Pelanggan
        </div>

        <table class="table">
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
                @foreach ($Pelanggan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->no_telpon }}</td>
                        <td>{{ $data->no_kk }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->type_mobil }}</td>
                        <td>
                            <a href="/pelanggan/{{$data->id}}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
