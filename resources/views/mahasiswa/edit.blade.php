@extends('layouts.app')
@section('title', 'Edit Mahasiswa - SIAKAD')
@section('content')
<div class="container">
    <h2>Edit Mahasiswa</h2>
    @if (count($errors)) <div class="alert" style="background:#fdecea;color:#a94442;"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
    <div class="panel"><div class="panel-heading" style="background:#172b4d;">Form Mahasiswa</div><div class="panel-body">
        <form action="{{ url('/mahasiswa/'.$mahasiswa->id) }}" method="POST">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="form-group"><label>Nama Lengkap</label><input name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required></div>
            <div class="form-group"><label>NIM</label><input name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required></div>
            <div class="form-group"><label>Jurusan</label><select name="jurusan_id" class="form-control" required>
                @foreach ($jurusans as $jurusan)<option value="{{ $jurusan->id }}" {{ old('jurusan_id', $mahasiswa->jurusan_id) == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>@endforeach
            </select></div>
            <button class="btn">Simpan Perubahan</button>
            <a href="{{ url('/mahasiswa') }}" class="btn" style="background:#6b7280;">Kembali ke Daftar Mahasiswa</a>
        </form>
    </div></div>
</div>
@endsection
