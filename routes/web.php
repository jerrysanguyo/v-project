<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/passcode', function () {
    return view('passcode');
});

Route::get('/home', function () {
    return view('home');
});