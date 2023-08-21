<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\LandingController;

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
    return view('welcome');
});


// akan relatif terhadap folder controllers pada http di folder app
// contoh untuk memanggil controller, harus dalam bentuk array dengan isi: parameter pertama adalah namespacenya dan parameter kedua adalah nama method nya
// Route::get('/halo', ['App\Http\Controllers\Frontsite\LandingController', 'index'])    <----;
Route::get('/testing', ['App\Http\Controllers\TestController2', 'index']);
// contoh ↖️




Route::get('/landing', ['App\Http\Controllers\Frontsite\LandingController', 'index']);

//
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
