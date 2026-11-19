@extends('layouts.app')
@section('title', 'Data Dosen - SIAKAD')
@section('content')
<div class="container"><h2>Data Dosen</h2>
@if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
<p><a href="{{ url('/dosen/create') }}" class="btn">Tambah Dosen</a> <a href="{{ url('/home') }}" class="btn" style="background:#6b7280;">Kembali ke Dashboard</a></p>
<div class="panel"><div class="panel-body" style="overflow-x:auto;"><table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
<tr><th>NIDN</th><th>Nama</th><th>Email</th><th>Jurusan</th><th>Aksi</th></tr>
@foreach ($dosens as $dosen)<tr><td>{{ $dosen->nidn }}</td><td>{{ $dosen->nama }}</td><td>{{ $dosen->email }}</td><td>{{ $dosen->jurusan ? $dosen->jurusan->nama : '-' }}</td><td>
<a class="btn" href="{{ url('/dosen/'.$dosen->id.'/edit') }}">Edit</a>
<form action="{{ url('/dosen/'.$dosen->id) }}" method="POST" style="display:inline;">{{ csrf_field() }}{{ method_field('DELETE') }}<button class="btn" style="background:#e74c3c;" onclick="return confirm('Hapus dosen ini?')">Hapus</button></form>
</td></tr>@endforeach
</table>{{ $dosens->links() }}</div></div></div>
@endsection
