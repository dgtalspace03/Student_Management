<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'setLocale'
])->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/lang/{la}',function ($la){
    if($la=='bn' || $la=='en'){
        Session::put('lang',$la);
    }
    return redirect()->back();
})->name('setLanguage');