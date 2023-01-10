<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;
use Carbon\Carbon;
use App\Http\Middleware\Authenticate;

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

Route::get('/welcome', function () {
    return view('welcomepage');
});

Route::get('/', function () {
    return view('home');
})->middleware('auth');
Route::get('exporting',[UploadController::class,'export'])->name('export-user');
Route::post('importing',[UploadController::class,'importing'])->name('import-user');

Route::get('getdata',[CustomerController::class,'getdata'])->name('getdata');
Route::get('matchit',[UploadController::class,'Send_Kro'])->name('getdata');

Route::get('send',[MailController::class,'sendMail']);

Route::get('car',function (){
    $now = Carbon::today()->format('m-d')  ;
     echo $now;
});



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



