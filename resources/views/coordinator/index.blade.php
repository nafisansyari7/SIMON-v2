@extends('layout.master')

@section('title', 'Koordinator | Rekomendasi')
@section('content')
	<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h3>Data Rekomendasi</h3>
    <a href="rekomendasi/tambah" class="btn btn-success">Tambah Rekomendasi</a>
	
	<br/>
	<br/>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Judul</th>
			<th>Klien</th>
			<th>Keterangan</th>
			<th>Status</th>
			<th>Opsi</th>
		</tr>
		@foreach($rekomendasi as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->judul }}</td>
			<td>{{ $p->klien }}</td>
			<td>{{ $p->keterangan }}</td>
			<td>{{ $p->stat }}</td>
			<td>
				<a href="rekomendasi/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
				<a href="rekomendasi/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

	<br/>
	Halaman : {{ $rekomendasi->currentPage() }} <br/>
	Jumlah Data : {{ $rekomendasi->total() }} <br/>
	Data Per Halaman : {{ $rekomendasi->perPage() }} <br/>
 
 
	{{ $rekomendasi->links() }}


    @endsection