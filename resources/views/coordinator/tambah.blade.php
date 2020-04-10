<!DOCTYPE html>
<html>
<head>
	<title>Tambah Rekomendasi</title>
</head>
<body>

	<h3>Data rekomendasi</h3>

	<a href="/koor/rekomendasi"> Kembali</a>
	
	<br/>
	<br/>

	<form action="store" method="post">
		{{ csrf_field() }}
		judul <input type="text" name="judul"> <br/>
		klien <input type="text" name="klien"> <br/>
		keterangan <input type="text" name="keterangan"> <br/>
		status <input type="text" name="stat"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
		


</body>
</html>