<?php

use App\Http\Controllers\public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('home');

Route::get('/find-job', function () {
    return view('frontend.pages.findjob');
})->name('find.job');


Route::get('/post-job', function () {
    return view('frontend.pages.postjob');
})->name('post.job');


Route::get('/pricing', function () {
    return view('frontend.pages.pricing');
})->name('pricing');

Route::get('/hire-professional', function () {
    return view('frontend.pages.hireprofessional');
})->name('hireprofessional');
