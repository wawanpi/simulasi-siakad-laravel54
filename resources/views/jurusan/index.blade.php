@extends('layouts.app')
@section('title', 'Data Jurusan - SIAKAD')
@section('content')
<div class="container"><h2>Data Jurusan</h2>
@if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
<p><a href="{{ url('/jurusan/create') }}" class="btn">Tambah Jurusan</a> <a href="{{ url('/home') }}" class="btn" style="background:#6b7280;">Kembali ke Dashboard</a></p>
<div class="panel"><div class="panel-body" style="overflow-x:auto;"><table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
<tr><th>Kode</th><th>Nama Jurusan</th><th>Keterangan</th><th>Aksi</th></tr>
@foreach ($jurusans as $jurusan)<tr><td>{{ $jurusan->kode }}</td><td>{{ $jurusan->nama }}</td><td>{{ $jurusan->keterangan }}</td><td>
<a class="btn" href="{{ url('/jurusan/'.$jurusan->id.'/edit') }}">Edit</a>
<form action="{{ url('/jurusan/'.$jurusan->id) }}" method="POST" style="display:inline;">{{ csrf_field() }}{{ method_field('DELETE') }}<button class="btn" style="background:#e74c3c;" onclick="return confirm('Hapus jurusan ini?')">Hapus</button></form>
</td></tr>@endforeach
</table>{{ $jurusans->links() }}</div></div></div>
@endsection
