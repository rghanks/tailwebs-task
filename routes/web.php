<?php


use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Student;
 



Route::get('/', function () {
    return view('login');
});



Route::group(['prefix' => 'account'], function(){
    // for guest users
    Route::group(['middleware' => ['guest']], function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    // For authenticated user only
    Route::group(['middleware' => ['auth']], function() {        
        Route::get('student', Student::class)->name('account.dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');       
    });
});
    

    