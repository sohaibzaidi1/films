<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('films');
});

//Route::get('/', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
Route::get('/films', 'Frontend\HomeController@index')->name('films');
// Admin Auth
Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
Route::get('signup', 'Auth\RegisterController@signup')->name('signup');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('film/create', 'FilmController@index')->name('movie.create')->middleware('auth');
Route::post('film/store', 'FilmController@store')->name('film.store')->middleware('auth');

Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
Route::get('logout', 'Auth\Admin\LoginController@logout');

// Admin Dashborad
Route::group([
'namespace' => 'Backend\Admin',
'prefix' => 'admin',
'as' => 'admin.',
'middleware' => 'auth:admin'],
function () {
    require base_path('routes/backend/admin.php');
});