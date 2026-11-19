@extends('layouts.app')
@section('title', 'Tambah Mata Kuliah - SIAKAD')
@section('content')
<div class="container"><h2>Tambah Mata Kuliah</h2>
@if (count($errors)) <div class="alert" style="background:#fdecea;color:#a94442;"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
<div class="panel"><div class="panel-heading" style="background:#172b4d;">Formulir Mata Kuliah</div><div class="panel-body">
<form action="{{ url('/mata-kuliah') }}" method="POST">{{ csrf_field() }}
<div class="form-group"><label>Kode Mata Kuliah</label><input name="kode" class="form-control" value="{{ old('kode') }}" required></div>
<div class="form-group"><label>Nama Mata Kuliah</label><input name="nama" class="form-control" value="{{ old('nama') }}" required></div>
<div class="form-group"><label>SKS</label><input type="number" name="sks" class="form-control" value="{{ old('sks', 3) }}" min="1" max="10" required></div>
<div class="form-group"><label>Semester</label><input type="number" name="semester" class="form-control" value="{{ old('semester', 1) }}" min="1" max="14" required></div>
<div class="form-group"><label>Jurusan</label><select name="jurusan_id" class="form-control" required><option value="">-- Pilih Jurusan --</option>
@foreach ($jurusans as $jurusan)<option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>@endforeach
</select></div>
<button class="btn">Simpan Mata Kuliah</button><a href="{{ url('/mata-kuliah') }}" class="btn" style="background:#6b7280;">Kembali ke Daftar Mata Kuliah</a>
</form></div></div></div>
@endsection
