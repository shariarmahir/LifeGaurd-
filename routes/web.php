<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
})->name('home');


// Add this simple route to your routes/web.php file

 Route::get('/womens-health-dashboard', function () {
 return view('womens-health.dashboard');
 });

Route::get('/womens-health/dashboard', function () {
    return view('womens-health.dashboard');
})->name('womens-health.dashboard');


Route::get('/dashboard/lifestream', function () {
    return view('dashboard.lifestream');
})->name('dashboard.lifestream');


