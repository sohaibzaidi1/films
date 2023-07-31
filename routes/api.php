<?php

Route::get('/films', 'Api\Backend\FilmApiController@index')->name('films');
\Route::post('/comments', 'Api\Backend\FilmApiController@storeComment')->name('comments');