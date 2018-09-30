<?php

// Auth
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::post('/refresh', 'AuthController@refresh');
Route::post('/getInfo', 'AuthController@getInfo');
Route::post('/test', 'Controller@test' ) ;
Route::post('/createStudentAccount', 'Controller@createStudentAccount' ) ;

// Rooms
Route::post('/getStudentRoom', 'RoomController@getStudentRoom');
Route::post('/setStudentRoom', 'RoomController@setStudentRoom');
Route::post('/getAllRooms', 'RoomController@getAllRooms');
Route::post('/changeStudentRoom', 'RoomController@changeStudentRoom');
