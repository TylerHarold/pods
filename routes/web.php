<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function() {
   Route::get('/', 'Controller@index');

   Route::get('/login', 'Controller@viewLogin');
   Route::post('/login', 'AuthenticationController@login');

   Route::get('/register', 'Controller@viewRegister');
   Route::post('/register', 'AuthenticationController@register');

   Route::get('/logout', 'AuthenticationController@logout');

   Route::get('/about', 'Controller@about');

   Route::get('/home', 'Controller@home');

   Route::prefix('/p')->group(function() {
      Route::get('/', 'Controller@home');
      Route::get('/{id}', 'Controller@viewPod')->middleware('isMember');
   });

   Route::prefix('/u')->group(function() {
       Route::get('/', 'Controller@profile');
       Route::get('/{username}', 'Controller@profile');
   });
});
