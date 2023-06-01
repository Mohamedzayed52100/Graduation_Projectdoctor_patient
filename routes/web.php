<?php

use App\Http\Controllers\Online;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ZoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use PhpParser\ErrorHandler\Collecting;
use Illuminate\Support\Facades\Auth;


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







    $name ="mohamed ";
    $age  =22;
    $job ="software engineer";
    $lo ="Google";


    return view('welcome' , get_defined_vars());





    Collection::macro('toUppertest' , function(){
        return $this->map(function($value){
            return strtoupper($value);
        });

    });
    $collect=collect(['mohamed' , 'ahmed' , 'yousef' , 'mahmoud'])->toUppertest();
    return $collect->all();



    ///Lazy collection
    /*
    for reduce memory
    */




    return $collect->sum();

});






Auth::routes();

///Auth::user()->name;
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::any('/' , function(){
//     return 'mohamed zayed';
// });





Route::get('doctorlogin', function() {
    return redirect('/login');
});
Route::get('patientlogin', function() {
    return redirect('/login');
});
// Route::redirect('home'  , 'logout');

Route::get('Logout', function() {
     session()->regenerate();
    session()->invalidate();
    return redirect('/');

});



Route::get('home' , function(){
    session()->regenerate();
    session()->invalidate();
    return redirect('/');


});



Route::any('justTest' , [StudentController::class,'justTest']);
Route::any('justTest2' , [StudentController::class,'justTest2']);
Route::any('ChartTest' , [StudentController::class,'ChartTest']);



// Route::any('test' , function(){
//     return  date('Y-m-d H:i:s' );
// });


/*
29/4 officially zayed is Contstant at Ecpc 2023

*/





// Route::get('result' , function(){
//     return view('patient_pages.result');
// });

// Route::get('vitalSigns/{$type}' , [PatientController::class, 'vitalSigns']);



Route::get('testzoom' , function(){
    return view('testzoom');
});

 



 
Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom.index');
Route::post('/zoom/schedule', [ZoomController::class, 'scheduleMeeting'])->name('zoom.schedule');
Route::post('/scheduleMeeting2', [ZoomController::class, 'scheduleMeeting2']);//->name('zoom.schedule');



Route::Post('zayedalll' , function(Request $request){

    return $request->all();

});



Route::get('/'  , function()  {
    // session()->regenerate();
    // session()->invalidate();
    // return view('website');

    
    /*
    
      if(session('PatientLoginMiddleware') and session('DoctorLoginMiddleware'))
    {
     session()->regenerate();
    session()->invalidate(); 
    return redirect('/login');
    
    }
    */
    if(session('PatientLoginMiddleware')  ==false and session('DoctorLoginMiddleware')==false){
        return view('website');
    }


    else  if(session('PatientLoginMiddleware') and session('DoctorLoginMiddleware')==false ){
        return redirect('/Patientprofile');
    }
    else if(session('DoctorLoginMiddleware') and session('PatientLoginMiddleware') ==false){
        return redirect('/DoctorProfile');
    }   
    session()->regenerate();
    session()->invalidate(); 
   // return redirect('/login');
     return view('website');

    

});


Route::get('/login' , function(){

    if(session('PatientLoginMiddleware')  ==false and session('DoctorLoginMiddleware')==false){
        return view('auth.login');
    }


    else  if(session('PatientLoginMiddleware') and session('DoctorLoginMiddleware')==false ){
        return redirect('/Patientprofile');
    }
    else if(session('DoctorLoginMiddleware') and session('PatientLoginMiddleware') ==false){
        return redirect('/DoctorProfile');
    }   
    session()->regenerate();
    session()->invalidate(); 
   // return redirect('/login');
   return view('auth.login');

});