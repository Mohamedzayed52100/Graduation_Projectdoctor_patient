<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportPDFController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ZoomController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


use App\Http\Middleware\DoctorLoginMiddleware;
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
/* Doctor */


Route::any('weloveps' , function(){


    return "yes it's docor pages";

});



Route::middleware(DoctorLoginMiddleware::class)->group(function(){ ///begin of Middleware












    
Route::view('Doctormessage' , 'doctor_pages.Doctormessages');
Route::view('DoctorProfile' , 'doctor_pages.DoctorProfile');
Route::view('emergencyList' , 'doctor_pages.emergencyList');
Route::view('HomeDoctor' , 'doctor_pages.HomeDoctor');
Route::view('lock-screen' , 'doctor_pages.lock-screen');
Route::view('loginDoctor' , 'doctor_pages.loginDoctor');
Route::view('medicalrecord_Doctor' , 'doctor_pages.medicalrecord_Doctor');
Route::view('patientListDoctor' , 'doctor_pages.patientListDoctor');



Route::get('zoomDoctor'  , [DoctorController::class , 'zoomDoctor']);
Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom.index');
Route::post('/zoom/schedule', [ZoomController::class, 'scheduleMeeting'])->name('zoom.schedule');
Route::post('/scheduleMeeting2', [ZoomController::class, 'scheduleMeeting2']);//->name('zoom.schedule');

Route::get('HomeDoctor'  , [DoctorController::class , 'HomeDoctor']);
Route::get('medicalrecord_Doctor/{id}'  , [DoctorController::class , 'medicalrecord_Doctor']);
Route::any('medicalrecord_Doctor_submit'  , [DoctorController::class , 'medicalrecord_Doctor_submit']);
// Route::any('patientListDoctor'  , [DoctorController::class , 'patientListDoctor'])->name('users.index');;




Route::get('patientListDoctor', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');


Route::any('emergencyList' , [DoctorController::class, 'emergencyList']);
Route::any('DoctorProfile' , [DoctorController::class, 'DoctorProfile']);
Route::any('changeDoctoPassword' , [DoctorController::class, 'changeDoctoPassword']);


Route::match(['get' , 'post'], 'editDoctorPersonalInfo' , [DoctorController::class, 'editDoctorPersonalInfo']);
Route::match(['get' , 'post'], 'lockscreensubmit' , [DoctorController::class, 'lockscreensubmit']);



Route::get('removepatientBydoctor/{id}'  , [DoctorController::class, 'removepatientBydoctor']);













}); ///////////////////////////////////////ending of middleware



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
