<?php

use Illuminate\Support\Facades\Route;

// Frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\RegisterController;

// Backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\ReportController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\TransactionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\HospitalPatientController;


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

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){
    
    // Appointment Page
    Route::resource('appointment', AppointmentController::class);
    
    // Payment Page
    Route::resource('payment', PaymentController::class);

    // Register Success Page
    Route::resource('register_success', RegisterController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function (){

    // Dashboard Page
    Route::resource('dashboard', DashboardController::class);

    // Config Payment Page
    Route::resource('config_payment', ConfigPaymentController::class);

    // consultation Page
    Route::resource('consultation', ConsultationController::class);
    
    // doctor Page
    Route::resource('doctor', DoctorController::class);

    // permission Page
    Route::resource('permission', PermissionController::class);

    // report Page
    Route::resource('report', ReportController::class);

    // role Page
    Route::resource('role', RoleController::class);

    // Specialist Page
    Route::resource('specialist', SpecialistController::class);

    // Transaction Page
    Route::resource('transaction', TransactionController::class);

    // Type User Page
    Route::resource('type_user', TypeUserController::class);
    
    // User Page
    Route::resource('user', UserController::class);

    // Report Appointment Page
    Route::resource('appointment', ReportAppointmentController::class);

    // Report Transaction Page
    Route::resource('transaction', ReportTransactionController::class);

    // Hospital Patient Page
    Route::resource('hospital_patient', HospitalPatientController::class);
});
