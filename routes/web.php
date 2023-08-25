<?php

use App\Http\Controllers\Frontsite\AppointmentController;
use Illuminate\Support\Facades\Route;


// import controller
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\TestController2;


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

// Route::resource fungsi sama seperti GET, POST DLL, hanya saja itu akan otomatis mencocokan http methodnya sesuai dengan jika menggunakan php artisan make:controller --resource
// dipisah dari group karena ini tidak butuh authentikasi untuk akses landing pagenya
Route::resource('/', LandingController::class);

// contoh jika pakai middleware
// Route::resource('/', LandingController::class)->middleware(['auth::sactum' => 'verified']);


// contoh groping route ->

// ini adalah Front site
Route::group(['middleware' => ['auth::sactum' => 'verified']], function (){

    // Appointment Page
    Route::resource('appointment', AppointmentController::class);

    // Payment Page
    Route::resource('payment', PaymentController::class);

});

// ini Back site
Route::group(['prefix' => 'backsite', 'as' => 'back', 'middleware' => ['auth::sactum' => 'verified']], function (){
    Route::get('dashboard', function (){
        return view('dashboard');
    });


});



















// ini latihan
// akan relatif terhadap folder controllers pada http di folder app
// contoh untuk memanggil controller, harus dalam bentuk array dengan isi: parameter pertama adalah namespacenya dan parameter kedua adalah nama method nya
// Route::get('/halo', ['App\Http\Controllers\Frontsite\LandingController', 'index'])    <----;
Route::get('/testing', ['App\Http\Controllers\TestController2', 'index']);
// contoh ↖️

// contoh 2
// bisa import dulu controller nya lalu buat seperti dibawah dengan array parameter 1 adalah controllernya dan parameter ke 2 adalah nama method yang ada pada controller tersebut yang akan digunakan
Route::get('/testing2', [TestController2::class, 'index'] );
//
Route::get('/landing', ['App\Http\Controllers\Frontsite\LandingController', 'index']);
// end latihan





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
