@extends('layouts.app')
@section('title', 'Data Mata Kuliah - SIAKAD')
@section('content')
<div class="container"><h2>Data Mata Kuliah</h2>
@if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
<p><a href="{{ url('/mata-kuliah/create') }}" class="btn">Tambah Mata Kuliah</a> <a href="{{ url('/home') }}" class="btn" style="background:#6b7280;">Kembali ke Dashboard</a></p>
<div class="panel"><div class="panel-body" style="overflow-x:auto;"><table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
<tr><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Semester</th><th>Jurusan</th><th>Aksi</th></tr>
@foreach ($mataKuliah as $mk)<tr><td>{{ $mk->kode }}</td><td>{{ $mk->nama }}</td><td>{{ $mk->sks }}</td><td>{{ $mk->semester }}</td><td>{{ $mk->jurusan ? $mk->jurusan->nama : '-' }}</td><td>
<a class="btn" href="{{ url('/mata-kuliah/'.$mk->id.'/edit') }}">Edit</a>
<form action="{{ url('/mata-kuliah/'.$mk->id) }}" method="POST" style="display:inline;">{{ csrf_field() }}{{ method_field('DELETE') }}<button class="btn" style="background:#e74c3c;" onclick="return confirm('Hapus mata kuliah ini?')">Hapus</button></form>
</td></tr>@endforeach
</table>{{ $mataKuliah->links() }}</div></div></div>
@endsection
