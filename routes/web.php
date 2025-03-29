<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

#admin---------------------------------------
Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('adminlogin');

Route::get('/admindashboard', function () {
    return view('admindashboard');
})->name('admindashboard');

Route::get('/admin-manage-buses', function () {
    return view('admin-manage-buses');
})->name('admin-manage-buses');

Route::get('/admin-manage-terminals', function () {
    return view('admin-manage-terminals');
})->name('admin-manage-terminals');

Route::get('/admin-manage-routes', function () {
    return view('admin-manage-routes');
})->name('admin-manage-routes');

Route::get('/admin-tickets', function () {
    return view('admin-tickets');
})->name('admin-tickets');

#driver----------------------------------
Route::get('/driverlogin', function () {
    return view('driverlogin');
})->name('driverlogin');

Route::get('/driverdashboard', function () {
    return view('driverdashboard');
})->name('driverdashboard');

Route::get('/driver-sched', function () {
    return view('driver-sched');
})->name('driver-sched');

Route::get('/driver-notification', function () {
    return view('driver-notification');
})->name('driver-notification');

Route::get('/driver-passenger', function () {
    return view('driver-passenger');
})->name('driver-passenger');

#conductor----------------------------------
Route::get('/conductorlogin', function () {
    return view('conductorlogin');
})->name('conductorlogin');

Route::get('/conductordashboard', function () {
    return view('conductordashboard');
})->name('conductordashboard');

Route::get('/conductor-passengerlist', function () {
    return view('conductor-passengerlist');
})->name('conductor-passengerlistd');

Route::get('/conductor-ticketvalid', function () {
    return view('conductor-ticketvalid');
})->name('conductor-ticketvalid');
