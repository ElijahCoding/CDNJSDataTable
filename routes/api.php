<?php

use Illuminate\Http\Request;

Route::get('/libraries', 'Api\LibraryController@index')->name('libraries.index');
