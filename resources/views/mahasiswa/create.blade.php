
@extends('layouts.app')

@section('title', 'Tambah Mahasiswa - SIAKAD')

@section('content')
<div class="container">

    <div style="margin-bottom:25px;">
        <h2>Tambah Mahasiswa</h2>
        <p style="color:#8793a5;">
            Masukkan informasi mahasiswa baru ke dalam sistem akademik.
        </p>
    </div>

    <div class="panel panel-default" style="border-radius:12px;overflow:hidden;">

        <div class="panel-heading"
             style="background:#172b4d;color:white;padding:18px;">
            <strong>Formulir Data Mahasiswa</strong>
        </div>

        <div class="panel-body" style="padding:30px;">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Data belum berhasil disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/mahasiswa') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap mahasiswa"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Nomor Induk Mahasiswa (NIM)</label>
                    <input
                        type="text"
                        name="nim"
                        class="form-control"
                        value="{{ old('nim') }}"
                        placeholder="Contoh: 20260001"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input
                        type="text"
                        name="jurusan"
                        class="form-control"
                        value="{{ old('jurusan') }}"
                        placeholder="Contoh: Teknik Informatika"
                        required
                    >
                </div>

                <hr>

                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <button type="submit" class="btn">
                        Simpan Mahasiswa
                    </button>

                    <a href="{{ url('/home') }}"
                       class="btn"
                       style="background:#6b7280;">
                        Kembali ke Dashboard
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
