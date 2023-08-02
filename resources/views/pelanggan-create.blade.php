@extends('layouts.main')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Data Pelanggan</title>
    <!-- Masukkan link CSS Bootstrap terbaru -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- CSS tambahan untuk form cantik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-container label {
            font-weight: bold;
            color: #333;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea,
        .form-container select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
        }

        .form-container .custom-file-label {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .form-container button[type="submit"] {
            background-color: #007bff;
            border: none;
            padding: 12px 20px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1>Form Tambah Data Pelanggan</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="mb-3">
                    <label for="no_telpon">No. Telepon</label>
                    <input type="tel" class="form-control" id="no_telpon" name="no_telpon" required>
                </div>
                <div class="mb-3">
                    <label for="no_kk">No. KK</label>
                    <input type="number" class="form-control" id="no_kk" name="no_kk" required>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo">Foto NPWP</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*">
                        <label class="custom-file-label" for="photo">Pilih file</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo2">Foto KTP</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo2" name="photo2" accept="image/*">
                        <label class="custom-file-label" for="photo2">Pilih file</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo3">Foto KK</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo3" name="photo3" accept="image/*">
                        <label class="custom-file-label" for="photo3">Pilih file</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo4">Foto Buku Nikah</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo4" name="photo4" accept="image/*">
                        <label class="custom-file-label" for="photo4">Pilih file</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class='mb-3'>
                        <label> merk mobil</label>
                        <select id="selectMerk" class="form-select" name="merk_id" aria-label="Default select example">

                        </select>
                    </div>

                    <div class='mb-3'>
                        <label> Type mobil</label>
                        <select id="selectType" class="form-select" name="type_id" aria-label="Default select example">

                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>


    <script>
        $(document).ready(function() {

            $("#selectMerk").select2({
                placeholder: 'Pilih Merk',
                ajax: {
                    url: "{{ route('merk.index') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama_merk
                                }
                            })
                        }
                    }
                }
            });

            $("#selectMerk").change(function() {
                let id = $('#selectMerk').val();

                $("#selectType").select2({
                    placeholder: 'Pilih Type',
                    ajax: {
                        url: "{{ url('selectType') }}/" + id,
                        processResults: function({data}){
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.type_mobil
                                    }
                                })
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>



@endsection
