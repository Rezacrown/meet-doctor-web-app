<?php

use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use Illuminate\Support\Facades\Route;


// import controller
// frontsite
use App\Http\Controllers\TestController2;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\backsite\DocterController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\backsite\SpecialistController;
use App\Http\Controllers\backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;

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
    // dashboard
    // Route::resource('payment', function () {
    //     return view('pages.frontsite.dashboard.index');
    // });




    // sukses route
    // Route::get('sukses', function () {

    //     return response()->view('pages.frontsite.success.signup-success');
    // });

    // Route::get('sukses2', function () {

    //     return response()->view('pages.frontsite.success.payment-success');
    // });

});

// ini Back site
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth::sactum' => 'verified']], function (){

    // dashboard Route
        // wajib kasih names untuk nama routingnya, dan cara aksesnya adalah dengan name prefix + name route + nama method contoh
        // backsite.dashboard.index
   	   Route::resource('dashboard', DashboardController::class);

    //    type_user route
   	   Route::resource('type_user', TypeUserController::class);

    //    specilaist route
   	   Route::resource('specialist', SpecialistController::class);

    //    docter route
   	   Route::resource('docter', DocterController::class);

    //    Role User route
   	   Route::resource('role', RoleController::class);

    //    Permission route
   	   Route::resource('permission', PermissionController::class);

    //  Permission route
   	   Route::resource('permission', PermissionController::class);

       //    User route
   	   Route::resource('user', UserController::class);

       //   Config_payment route
   	   Route::resource('config_payment', ConfigPaymentController::class);

       //  consultation route
   	   Route::resource('consultation', ConsultationController::class);

       //  Hospital patient route
   	   Route::resource('hospital_patient', HospitalPatientController::class);

       // report appointment route
   	   Route::resource('appointment', ReportAppointmentController::class);

        // report transaction route
    Route::resource('transaction', ReportTransactionController::class);

});






















// ini latihan
// akan relatif terhadap folder controllers pada http di folder app
// contoh untuk memanggil controller, harus dalam bentuk array dengan isi: parameter pertama adalah namespacenya dan parameter kedua adalah nama method nya
// Route::get('/halo', ['App\Http\Controllers\Frontsite\LandingController', 'index'])    <----;
// Route::get('/testing', ['App\Http\Controllers\TestController2', 'index']);
// contoh ↖️

// contoh 2
// bisa import dulu controller nya lalu buat seperti dibawah dengan array parameter 1 adalah controllernya dan parameter ke 2 adalah nama method yang ada pada controller tersebut yang akan digunakan
// Route::get('/testing2', [TestController2::class, 'index'] );
//
// Route::get('/landing', ['App\Http\Controllers\Frontsite\LandingController', 'index']);
// end latihan





//
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
