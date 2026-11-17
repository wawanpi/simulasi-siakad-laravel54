
@extends('layouts.app')

@section('title', 'Halaman Belajar')

@section('content')

    <h1>Halo, {{ $nama }}!</h1>

    <p>Pekerjaan: {{ $pekerjaan }}</p>
    <p>Kampus: {{ $kampus }}</p>

    @if ($status == 'aktif')
        <p>Status: Aktif</p>
    @elseif ($status == 'nonaktif')
        <p>Status: Tidak Aktif</p>
    @elseif ($status == 'malas')
        <p>Status: Malas</p>
    @else
        <p>Status tidak diketahui</p>
    @endif

    <h3>Daftar Hobi:</h3>

    <ul>
        @foreach ($hobi as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

@endsection
