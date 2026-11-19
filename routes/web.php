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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }

    return redirect('/login');
});

Route::get('/belajar', function () {
    return 'Halo! Ini halaman Laravel 5.4 pertama saya.';
});

Route::get('/belajar-controller', 'BelajarController@index');

Route::get('/profil', function () {
    return view('profil');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('dosen', 'DosenController');
    Route::resource('jurusan', 'JurusanController');
    Route::resource('mata-kuliah', 'MataKuliahController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
