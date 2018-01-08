<?php

Route::get('/', 'PageController@index');

Route::get('/add', 'PageController@add');
Route::post('/add', 'PageController@create');

Route::get('{path}/add', 'PageController@add')->where('path', '[/A-Za-z0-9]+');
Route::post('{path}/add', 'PageController@create')->where('path', '[/A-Za-z0-9]+');

Route::get('{path}/edit', 'PageController@edit')->where('path', '[/A-Za-z0-9]+');
Route::post('{path}/edit', 'PageController@update')->where('path', '[/A-Za-z0-9]+');

Route::get('{path}', 'PageController@show')->where('path', '([/A-Za-z0-9]+)')->name('show');;


