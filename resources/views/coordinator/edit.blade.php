<!DOCTYPE html>
<html>
<head>
	<title>Edit Rekomendasi</title>
</head>
<body>

	<h3>Edit Rekomendasi</h3>

	<a href="/koor/rekomendasi"> Kembali</a>
	
	<br/>
	<br/>

	@foreach($rekomendasi as $p)
	<form action="/koor/rekomendasi/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		Judul <input type="text" required="required" name="judul" value="{{ $p->judul }}"> <br/>
		Klien <input type="text" required="required" name="klien" value="{{ $p->klien }}"> <br/>
		Keterangan <input type="text" required="required" name="keterangan" value="{{ $p->keterangan }}"> <br/>
		Status <input type="text" name="stat"value="{{ $p->stat }}"><br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
</body>
</html>