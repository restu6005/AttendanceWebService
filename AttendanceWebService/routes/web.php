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
Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/mahasiswa', 'MahasiswaController@read')->name('mhs');
Route::get('/mahasiswa/search', 'MahasiswaController@search');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa/store', 'MahasiswaController@store');
Route::get('/mahasiswa/{nrp}/edit', 'MahasiswaController@edit');
Route::post('/mahasiswa/{nrp}', 'MahasiswaController@update');
Route::get('/mahasiswa/delete/{nrp}', 'MahasiswaController@destroy');

Route::get('/dosen', 'DosenController@read')->name('dosen');
Route::get('/dosen/create', 'DosenController@create')->name('dosen.add');
Route::post('/dosen/store', 'DosenController@store');
Route::get('/dosen/{nip}/edit', 'DosenController@edit');
Route::post('/dosen/{nip}', 'DosenController@update');
Route::get('/dosen/delete/{nip}', 'DosenController@destroy');

Route::group(['prefix' => 'mata-kuliah'], function(){
    Route::get('/', 'MKController@index')->name('mk');
    Route::get('/search','MKController@searching');
    Route::get('/create', 'MKController@create');
    Route::post('/create/submit','MKController@create_submit');
    Route::get('/edit/{id}', 'MKController@edit');
    Route::put('/edit/submit','MKController@edit_submit');
    Route::delete('/delete/{id}', 'MKController@delete')->name('matakuliah.delete');
});

Route::group(['prefix' => 'jadwal'], function(){
    Route::get('/', 'JadwalController@index')->name('jadwal');
    Route::get('/create', 'JadwalController@create');
    Route::post('/create/submit','JadwalController@create_submit');
    Route::get('/edit/{id}', 'JadwalController@edit');
    Route::put('/edit/submit','JadwalController@edit_submit');
    Route::delete('/delete/{id}', 'JadwalController@delete')->name('jadwal.delete');
});

Route::group(['prefix' => 'ambil_kuliah'], function(){
    Route::get('/', 'AmbilKuliahController@index')->name('ambil_mk');
    Route::group(['prefix' => 'peserta'], function(){
        Route::post('/', 'AmbilKuliahController@peserta');
        Route::post('/angkatan', 'AmbilKuliahController@angkatan');
        Route::post('/delete', 'AmbilKuliahController@delete');
        Route::post('/tambah', 'AmbilKuliahController@tambah');
    });
});

Route::group(['middleware' => ['auth']], function () {
    //Route::get('/kehadiran','KehadiranController@index');
    Route::group(['prefix' => 'kehadiran'], function(){
        Route::get('/','KehadiranController@index');
        Route::get('/edit/{id}','KehadiranController@edit');
    });
});



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gpassword',function(){
    return bcrypt('123');
});