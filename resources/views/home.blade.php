@extends('layouts.main')

@section('title', 'Home')

@section('content')

<h1>Ini Halaman Home</h1>
<h2>Selamat Datang {{Auth::user()->name}}</h2>
@endsection
