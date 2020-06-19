<?php

Route::get('/user','Web\User\GetAllController');
Route::get('/user/paginate','Web\User\PaginateController');
Route::post('/user', 'Web\User\CreateController');
Route::put('/user', 'Web\User\UpdateController');
Route::delete('/user', 'Web\User\DeleteController');