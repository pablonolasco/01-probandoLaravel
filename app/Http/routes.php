<?php

Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);
Route::get('saludando/{saludo?}', ['as' => 'saludos','uses' => 'PageController@saluda'])->where('saludo','[A-Za-z]+');
 //* darle nombre a la ruta
Route::get('contactame', ['as' => 'contactanos','uses' => 'PageController@contacto']);
Route::post('contacto', 'PageController@mensaje');

//Seguir esa convencion en las rutas
Route::get('mensajes',['as'=>'messages.index','uses'=>'MessageController@index']);
Route::post('mensajes',['as'=>'messages.store','uses'=>'MessageController@store']);
Route::get('mensajes/createok',['as'=>'messages.create','uses'=>'MessageController@create']);
Route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessageController@show']);
Route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessageController@edit']);
Route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessageController@update']);
Route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessageController@destroy']);

//Route::resource('mensajes', 'MessageController');
Route::get('login','Auth\AuthController@showLoginForm');
Route::post('login','Auth\AuthController@login');
/*
Route::get('test', function () {
    $user= new App\User;
    $user->name="admin";
    $user->email="pablo@hotmail.com";
    $user->password=bcrypt('1234');
    $user->save();

    return $user;
});*/