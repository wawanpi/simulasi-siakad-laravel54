@extends('layouts.app')
@section('title', 'Tambah Jurusan - SIAKAD')
@section('content')
<div class="container"><h2>Tambah Jurusan</h2>
@if (count($errors)) <div class="alert" style="background:#fdecea;color:#a94442;"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
<div class="panel"><div class="panel-heading" style="background:#172b4d;">Formulir Jurusan</div><div class="panel-body">
<form action="{{ url('/jurusan') }}" method="POST">{{ csrf_field() }}
<div class="form-group"><label>Kode Jurusan</label><input name="kode" class="form-control" value="{{ old('kode') }}" placeholder="Contoh: TI" required></div>
<div class="form-group"><label>Nama Jurusan</label><input name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Contoh: Teknik Informatika" required></div>
<div class="form-group"><label>Keterangan</label><textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea></div>
<button class="btn">Simpan Jurusan</button><a href="{{ url('/jurusan') }}" class="btn" style="background:#6b7280;">Kembali ke Daftar Jurusan</a>
</form></div></div></div>
@endsection
