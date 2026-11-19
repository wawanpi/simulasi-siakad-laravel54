@extends('layouts.app')
@section('title', 'Tambah Dosen - SIAKAD')
@section('content')
<div class="container"><h2>Tambah Dosen</h2>
@if (count($errors)) <div class="alert" style="background:#fdecea;color:#a94442;"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
<div class="panel"><div class="panel-heading" style="background:#172b4d;">Formulir Dosen</div><div class="panel-body">
<form action="{{ url('/dosen') }}" method="POST">{{ csrf_field() }}
<div class="form-group"><label>NIDN</label><input name="nidn" class="form-control" value="{{ old('nidn') }}" required></div>
<div class="form-group"><label>Nama Lengkap</label><input name="nama" class="form-control" value="{{ old('nama') }}" required></div>
<div class="form-group"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}"></div>
<div class="form-group"><label>Jurusan</label><select name="jurusan_id" class="form-control" required><option value="">-- Pilih Jurusan --</option>
@foreach ($jurusans as $jurusan)<option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>@endforeach
</select></div>
<button class="btn">Simpan Dosen</button><a href="{{ url('/dosen') }}" class="btn" style="background:#6b7280;">Kembali ke Daftar Dosen</a>
</form></div></div></div>
@endsection
