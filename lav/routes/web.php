<?php

use Illuminate\Support\Facades\Route;

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

// Digunakan untuk memberikan rute akses halaman web
Route::get('/', 'Mycontroller@index')->name('index');
Route::get('/tentang', 'Mycontroller@about')->name('about');
// routing halaman student
Route::get('/mahasiswa', 'StudentController@index')->name('student.index');
// routing halaman create data student
Route::get('/mahasiswa/tambah', 'StudentController@create')->name('student.create');
// routing store data
Route::post('/mahasiswa/tambah', 'StudentController@store')->name('student.store');
// routing halaman edit data student
Route::get('/mahasiswa/edit/{id}', 'StudentController@edit')->name('student.edit');
// routing halaman update data student
Route::put('/mahasiswa/edit/{id}', 'StudentController@update')->name('student.update');
// routing halaman delete data student
Route::delete('/mahasiswa/hapus/{id}', 'StudentController@destroy')->name('student.destroy');


// routing halaman data student
Route::get('/mahasiswa/data', 'StudentController@data')->name('student.data');
Route::get('/mahasiswa/data/hapus/{id}', 'StudentController@data_destroy')->name('student.data_destroy');




/*
Route::get('/', function () {
    return view('welcome');
});
*/