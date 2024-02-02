<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApntController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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
    return view('index');
});
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        if(Auth::user()->usertype == 'Donneur')
            return view('dashboard/donneurs/donneurs');

        if(Auth::user()->usertype == 'Patient')
            return view('dashboard/patients/patients');

        if(Auth::user()->usertype == 'Admin')
            return view('dashboard/admin/dashboard');    

    })->name('dashboard');
        
    Route::any('dashboard/fairedon/validerrdv', [ApntController::class, 'store'])->name('validerdv');

    Route::post('dahboard/updaterdv/update', [ApntController::class, 'update'])->name('updaterdv.post');

    Route::get('dashboard/fairedon/cancel', [ApntController::class, 'edit'])->name('cancelrdv.post');
    
    Route::get('/dashboard/fairedon', function(){ return view('/dashboard/donneurs/fairedon');})->name('fairedon');

    Route::get('dashboard/updaterdv', function(){return view('/dashboard/donneurs/updaterdv');})->name('updaterdv.view');

    Route::get('/dashboard/printcard', function(){return view('/dashboard/donneurs/printcard');})->name('printcard.view');
   
    Route::get('/dashboard/generatepdf', [ApntController::class, 'generatepdf'])->name('user.pdf');

    Route::get('/dashboard/besoinsang', function(){return view('dashboard/patients/besoinsang');})->name('besoinsang.view');

    Route::any('dashboard/besoinsang/validerrdv', [ApntController::class, 'store'])->name('validerdvp');

    Route::get('dashboard/updaterdvp', function(){return view('/dashboard/patients/updaterdvp');})->name('updaterdvp.view');

    Route::post('dahboard/updaterdvp/update', [ApntController::class, 'update'])->name('updaterdvp.post');

    Route::post('dashboard/besoinsang/cancel', [ApntController::class, 'edit'])->name('cancelrdvp.post');

    Route::get('dashboard/alldonnateurs', function(){ return view('dashboard/patients/alldon'); })->name('alldon.view');

    Route::get('dashboard/printcardpatients', function(){ return view('dashboard/patients/printcardp'); })->name('cartedon.view');

    Route::get('/dashboard/generatepdf_patient', [ApntController::class, 'generatepdfp'])->name('patients.pdf');

    Route::get('dashboard/admin/registerdetail/{iduser}', [UserController::class, 'showdetails'])->name('registerdetail.view');

    Route::get('/dashboard/admin/registerdetail/activate/{iduser}', [UserController::class, 'activate_user'])->name('activate_user.post');

    Route::get('dashboard/admin/allrdv', function(){ return view('dashboard/admin/allrdv'); })->name('allrdv.view');

    Route::get('/dashboard/admin/allrdv/rdvdetail/{idrdv}/{from}', [AdminController::class, 'rdvdetail'])->name('rdvdetail.view');

    Route::get('/dashboard/admin/allrdv/rdvdetail/confirmrdv/{idrdv}/{gp}', [AdminController::class, 'confirmrdv'])->name('confirmrdv.view');

    Route::get('/dashboard/admin/allrdv/rdvdetail/confirmrdv/addblood/{idrdv}/{gp}', [AdminController::class, 'addblood'])->name('confirmrdv.post');

    Route::get('/dashboard/admin/allrdv/rdvdetail/cancelrdv/{idrdv}/{iduser}', [AdminController::class, 'cancelrdv'])->name('cancelrdvadmin.post');

    Route::get('/dashoard/admin/stocksang', function(){return view('dashboard/admin/stocksang');})->name('stocksang.view');

    Route::get('/dashboard/admin/patient', function(){return view('dashboard/admin/patient');})->name('patient.view');

    Route::get('/dashboard/admin/donneur', function(){return view('dashboard/admin/donneur');})->name('donneur.view');

    Route::get('/dashboard/admin/registerdetail/suspend/{id}', [AdminController::class, 'suspend_account'])->name('suspend.post');

    Route::get('/dashboard/admin/reactivate/{id}', [AdminController::class, 'reactivate_account'])->name('reactivate.post');

    Route::get('/dashboard/admin/equipement', function(){return view('dashboard/admin/equipement');})->name('equip.view');

    Route::get('/dashboard/admin/equipement/add', [AdminController::class, 'add_equip'])->name('equip.post');

});

Route::post('/contact', [ContactController::class, 'contact'])->name('contact.post');

//Route::get('/register', function(){ return view('auth.register');})->name('register.view');;


require __DIR__.'/auth.php';
