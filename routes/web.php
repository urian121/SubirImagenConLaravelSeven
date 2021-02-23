<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'ImagenController@inicio')->name('inicio');

Route::post('/', 'ImagenController@guardarImg')->name('subirImg');

Route::post('saveImg/', 'ImagenController@guardarImgTwo')->name('guardarImgTwo');