<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', 'HomeController@index')->name('home');

// mahasiswa
Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();
Route::group(['middleware' => ['auth', 'role:mahasiswa']], function() {
    //mahasiswa
    Route::prefix('mahasiswa')->group(function () {
        Route::get('home', 'CollegeStudentController@index')->name('mahasiswa.home');
        Route::get('progress', 'CollegeStudentController@progress');
        Route::get('seminar', 'AgendaController@index')->name('agenda.list');
        Route::get('seminar/show', 'AgendaController@get');
        Route::get('mahasiswa-cek', 'GroupProjectController@show')->name('mahasiswa.index');
        Route::get('groupEdit/{id}', 'GroupProjectController@edit')->name('mahasiswa.edit');
        Route::get('groupEdit/editAnggota/{mhsId}', 'GroupProjectController@editAnggota')->name('mahasiswa.editAnggota');
        Route::post('groupEdit/editAnggota/update', 'GroupProjectController@updateAnggota')->name('mahasiswa.updateAnggota');
        Route::post('groupEdit/hapusAnggota', 'GroupProjectController@hapus')->name('mahasiswa.hapus');
        Route::post('groupEdit/tambahAnggota', 'GroupProjectController@tambahAnggota')->name('mahasiswa.tambah');
        Route::post('daftar', 'GroupProjectController@store')->name('mahasiswa.daftar');
        Route::get('project/{id}', 'CollegeStudentController@show');
        Route::put('project/{id}/edit', 'CollegeStudentController@update');
        Route::put('project/{id}/upload', 'CollegeStudentController@upload')->name('upload-laporan');
        Route::get('getVerif/{id}', 'GroupProjectController@getVerif');
        Route::put('daftarSeminar/{id}/edit', 'GroupProjectController@accSeminar');
        Route::get('detailDaftarSem/{id}', 'AgendaController@detailDaftar');
        Route::get('hadiriSeminar/{id}', 'AgendaController@hadiriSeminar');
        Route::get('hadiri', 'AgendaController@hadiriSeminar')->name('mahasiswa.hadir');
        Route::post('berhadir', 'AgendaController@yakin');
        Route::post('batalHadir', 'AgendaController@destroy');
        Route::get('/rekomendasi','RekomendasiController@indexStudent');
        Route::post('/rekomendasi/store','RekomendasiController@storeStudent');
        Route::post('/rekomendasi/batal','RekomendasiController@batalStudent');
        Route::get('/sertifikat','SertifikatController@index')->name('watched-list');
        Route::get('/cetakSertifikat/{id}/{userId}','SertifikatController@show');
        // Route::get('/cetakSertifikat','SertifikatController@mailTest');
    });   
    
});
Route::group(['middleware' => ['auth', 'role:koordinator']], function() {  
    // koordinator
    Route::prefix('koor')->group(function () {
        Route::get('dashboard', 'CoordinatorController@index')->name('coordinator.home');
        Route::get('mahasiswa', 'CoordinatorController@project_team');

        Route::get('bimbingan', 'GroupProjectProgressController@index');
        Route::get('bimbingan/show', 'GroupProjectProgressController@show');
        Route::get('seminar', 'CoordinatorController@seminar')->name('seminar.list');
        Route::get('daftarSeminar/show', 'SeminarController@get');
        Route::get('seminar/show', 'SeminarController@seminar');
        Route::get('detailDaftarSem/{id}', 'SeminarController@detailDaftar');
        Route::get('terimaSeminar/{id}', 'SeminarController@terima');
        Route::get('updateSeminar/{id}', 'SeminarController@show');
        Route::get('arsip-pk', 'CoordinatorController@showArsip');
        Route::get('arsip-pk/show', 'AdminController@arsipKoor');
        Route::get('detailArsip/{id}', 'SeminarController@detailArsip');
        Route::get('getDataTablePK', 'CoordinatorController@get');
        Route::get('getDataVerified', 'CoordinatorController@getVerified');
        Route::get('getDataTableVerif/{id}', 'CoordinatorController@getVerif');
        Route::get('getIsVerif/{id}', 'CoordinatorController@getIsVerif');
        Route::put('getIsVerif/{id}/edit', 'CoordinatorController@verifikasi');
        Route::get('updateSupervisor/{id}', 'CoordinatorController@getSupervisor');
        Route::put('updateSupervisor/{id}/edit', 'CoordinatorController@updateSupervisor');
        Route::delete('tolakProject/{id}', 'CoordinatorController@tolak');
        Route::delete('hapusProject/{id}', 'CoordinatorController@hapus');
        Route::get('bimbingan/{id}', 'GroupProjectProgressController@tampil');
        Route::put('bimbingan/{id}/update', 'GroupProjectProgressController@update');
        Route::put('verifSeminar/{id}/edit', 'SeminarController@verifikasi');
        Route::get('seminar/{id}', 'AdminController@show');
        Route::delete('tolakSeminar/{id}', 'SeminarController@destroy');
        Route::get('getSeminar/{id}', 'SeminarController@getSeminar');
        Route::put('updateSeminar/{id}/edit', 'SeminarController@update');
        Route::put('isDone/{id}/edit', 'SeminarController@isDone');
        Route::get('newsReport/{id}', 'GroupProjectNewsReportController@get');
        Route::put('newsReport/{id}/edit', 'GroupProjectNewsReportController@store');
        Route::delete('newsReport/{id}/delete', 'GroupProjectNewsReportController@destroy');
        Route::get('exportExcel', 'GroupProjectController@export');
        Route::get('observer/{id}', 'AgendaController@show');
        Route::get('absen/{id}', 'AgendaController@absen')->name('absen-seminar');
        Route::post('batalHadir', 'AgendaController@destroy');
        //route CRUD
        Route::get('/rekomendasi','RekomendasiController@index');
        Route::post('/rekomendasi/store','RekomendasiController@store');
        Route::post('/rekomendasi/update','RekomendasiController@update');
        Route::post('/rekomendasi/hapus','RekomendasiController@hapus');
        Route::post('/rekomendasi/batal','RekomendasiController@batal');
        Route::get('/cetakSertifikat/{id}/{userId}','SertifikatController@show');
    });
    });
Route::group(['middleware' => ['auth', 'role:admin']], function() {  
    // admin
    Route::prefix('admin')->group(function () {
        Route::get('mahasiswa', 'AdminController@showStudent')->name('admin.home');
        Route::get('getDataTableMhs', 'AdminController@get')->name('list-mhs');
        Route::post('simpanDataMhs', 'AdminController@save');
        Route::get('mahasiswa/{id}', 'AdminController@show');
        Route::put('mahasiswa/{id}/edit', 'AdminController@update');
        Route::post('mahasiswa/import', 'AdminController@import')->name('student-import');
        Route::get('jobdesc', 'JobdescController@index')->name('list-job');
        Route::get('jobdesc/{id}', 'JobdescController@edit')->name('pick-job');
        Route::put('jobdesc/{id}/edit', 'JobdescController@update')->name('edit-job');
        Route::get('getDataTableJobdesc', 'JobdescController@get')->name('get-job');
        Route::post('simpanDataJobdesc', 'JobdescController@store')->name('save-job');
        Route::delete('jobdesc/{id}', 'JobdescController@destroy')->name('jobdesc.destroy');
        Route::post('jobdesc/import', 'JobdescController@import')->name('jobdesc-import');
        Route::get('dosen', 'LecturerController@showLecturer');
        Route::get('getDataTableDosen', 'LecturerController@get');
        Route::post('simpanDataDosen', 'LecturerController@save');
        Route::get('dosen/{id}', 'LecturerController@show');
        Route::put('dosen/{id}/edit', 'LecturerController@update');
        Route::post('dosen/import', 'LecturerController@import')->name('lecturer-import');
        Route::get('arsip-pk', 'AdminController@showArsip');
        Route::get('arsip-pk/show', 'AdminController@arsipAdmin');
        Route::get('detailArsip/{id}', 'SeminarController@detailArsip');
        Route::get('newsReport/{id}', 'GroupProjectNewsReportController@getNews');
        Route::put('newsReport/{id}/edit', 'GroupProjectNewsReportController@storeNews');
        Route::get('exportExcel', 'GroupProjectController@export');
        });
    });
        // user
    Route::get('downloads', 'DownloadController@index')->name('download-list');
    Route::post('downloads/store', 'DownloadController@store');
    Route::delete('downloads/deleteDownloads/{id}', 'DownloadController@destroy');

    Route::get('profil', 'ProfileController@index')->name('profil');
    Route::post('profilUpdate/{id}', 'ProfileController@store');
    Route::get('changePassword', 'PasswordController@index');
    Route::post('changePassword', 'PasswordController@update')->name('change.password');
