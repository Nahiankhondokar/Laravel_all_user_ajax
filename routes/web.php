<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'student', 'namespace' => 'App\Http\Controllers'], function () {
    
    Route::get('/', 'StudentController@index') -> name('student.index');
    Route::post('/store', 'StudentController@store') -> name('student.store');
    Route::get('/all', 'StudentController@all') -> name('student.all');
    Route::get('/show/{id}', 'StudentController@show') -> name('student.show');
    Route::get('/delete/{id}', 'StudentController@delete') -> name('student.delete');
    Route::get('/edit/{id}', 'StudentController@edit') -> name('student.edit');

});


