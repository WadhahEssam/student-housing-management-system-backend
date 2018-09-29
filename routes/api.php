<?php

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::post('/refresh', 'AuthController@refresh');
Route::post('/getInfo', 'AuthController@getInfo');
Route::post('/test' , 'Controller@test' ) ;
Route::post('/createStudentAccount' , 'Controller@createStudentAccount' ) ;
