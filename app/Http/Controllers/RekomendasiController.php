<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RekomendasiController extends Controller
{
	public function index()
	{
    	// mengambil data dari table rekomendasi
		$rekomendasi = DB::table('rekomendasi')->paginate(10);

    	// mengirim data rekomendasi ke view index
		return view('coordinator.index',['rekomendasi' => $rekomendasi]);

	}

	// method untuk menampilkan view form tambah rekomendasi
	public function tambah()
	{
		// memanggil view tambah
		return view('coordinator.tambah');
	}

	// method untuk insert data ke table rekomendasi
	public function store(Request $request)
	{
		// insert data ke table rekomendasi
		DB::table('rekomendasi')->insert([
			'judul' => $request->judul,
			'klien' => $request->klien,
			'keterangan' => $request->keterangan,
			'stat' => $request->stat
		]);
		// alihkan halaman ke halaman rekomendasi
		return redirect('koor/rekomendasi');
	}

	// method untuk edit data rekomendasi
	public function edit($id)
	{
		// mengambil data rekomendasi berdasarkan id yang dipilih
		$rekomendasi = DB::table('rekomendasi')->where('id',$id)->get();
		// passing data rekomendasi yang didapat ke view edit.blade.php
		return view('coordinator.edit',['rekomendasi' => $rekomendasi]);
	}

	// update data rekomendasi
	public function update(Request $request)
	{
		// update data rekomendasi
		DB::table('rekomendasi')->where('id',$request->id)->update([
			'judul' => $request->judul,
			'klien' => $request->klien,
			'keterangan' => $request->keterangan,
			'stat' => $request->stat
		]);
		// alihkan halaman ke halaman rekomendasi
		return redirect('koor/rekomendasi');
	}

	// method untuk hapus data rekomendasi
	public function hapus($id)
	{
		// menghapus data rekomendasi berdasarkan id yang dipilih
		DB::table('rekomendasi')->where('id',$id)->delete();
		
		// alihkan halaman ke halaman rekomendasi
		return redirect('koor/rekomendasi');
	}
}