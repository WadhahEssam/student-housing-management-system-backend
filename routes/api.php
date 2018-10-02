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
Route::post('/clearStudentRoom', 'RoomController@clearStudentRoom');
Route::post('/getRoomInfo', 'RoomController@getRoomInfo');
Route::post('/getRoomID', 'RoomController@getRoomID');
Route::post('/getRoomsForWing', 'RoomController@getRoomsForWing');
Route::post('/getRoomsCount', 'RoomController@getRoomsCount');
Route::post('/getAvailableRoomsCount', 'RoomController@getAvailableRoomsCount');
Route::post('/getRoomForStudent', 'RoomController@getRoomForStudent');
Route::post('/getStudentForRoom', 'RoomController@getStudentForRoom');
