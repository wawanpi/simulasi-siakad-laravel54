
@extends('layouts.app')

@section('title', 'Dashboard SIAKAD')

@section('content')

<div class="container">

    <div style="margin-bottom:30px;">
        <h2>Dashboard Akademik</h2>
        <p style="color:#8793a5;">
            Selamat datang, {{ Auth::user()->name }}.
            Berikut ringkasan sistem akademik.
        </p>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    DATA MAHASISWA
                </div>
                <div class="panel-body">
                    <h2>{{ $totalMahasiswa }}</h2>
                    <p>Total mahasiswa terdaftar</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    DATA DOSEN
                </div>
                <div class="panel-body">
                    <h2>0</h2>
                    <p>Total dosen terdaftar</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    DATA JURUSAN
                </div>
                <div class="panel-body">
                    <h2>0</h2>
                    <p>Total jurusan tersedia</p>
                </div>
            </div>
        </div>

    </div>

    <div class="panel">
        <div class="panel-heading"
             style="background:#172b4d;color:white;">
            MENU AKADEMIK
        </div>

        <div class="panel-body">
            <div class="list-group">

                <a href="{{ url('/mahasiswa/create') }}"
                   class="list-group-item">
                    <strong>👨‍🎓 Data Mahasiswa</strong>
                    <p>Kelola informasi dan data mahasiswa.</p>
                </a>

                <a href="#" class="list-group-item">
                    <strong>👨‍🏫 Data Dosen</strong>
                    <p>Kelola informasi dosen.</p>
                </a>

                <a href="#" class="list-group-item">
                    <strong>🏢 Data Jurusan</strong>
                    <p>Kelola program studi dan jurusan.</p>
                </a>

                <a href="#" class="list-group-item">
                    <strong>📚 Mata Kuliah</strong>
                    <p>Kelola data mata kuliah akademik.</p>
                </a>

            </div>
        </div>
    </div>

</div>

@endsection
