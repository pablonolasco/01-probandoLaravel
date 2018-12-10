<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//


//* se pasa el nombre que se le dio a la ruta
//forma de mandar a ejecutar un middleware, no es la recomendable, y solo se usara para esa ruta
//Route::get('/', ['as' => 'home', 'uses' => 'PageController@home'])->middleware('example');
Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);
Route::get('saludando/{saludo?}', ['as' => 'saludos','uses' => 'PageController@saluda'])->where('saludo','[A-Za-z]+');
 //* darle nombre a la ruta
Route::get('contactame', ['as' => 'contactanos','uses' => 'PageController@contacto']);
Route::post('contacto', 'PageController@mensaje');

//Seguir esa convencion en las rutas
Route::get('mensajes',['as'=>'messages.index','uses'=>'MessageController@index']);
Route::post('mensaje',['as'=>'messages.store','uses'=>'MessageController@store']);
Route::get('mensaje/creater',['as'=>'messages.create','uses'=>'MessageController@create']);
Route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessageController@show']);
Route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessageController@edit']);
Route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessageController@update']);
Route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessageController@destroy']);


//* se pasa el nombre que se le dio a la ruta
/*Route::get('/', ['as' => 'home',function () {
    return view('home');
}]);*/

/*
Route::get('contact', function () {
    echo "<a href=".route('contactanos').">Contacto</a>";
    
    echo "<a href=".route('contactanos').">Contacto</a>";
    
    echo "<a href=".route('contactanos').">Contacto</a>";
});*/

/*Route::get('saludando/{saludo?}', ['as' => 'saludos',function ($saludo='Invitado') {
    //forma de arreglo
    //return view('saluda',['saludo' => $saludo]);
    //forma de arreglo
    //return view('saluda')->whit(['saludo' => $saludo]);
    $html="<h2>Contenido</h2>";
    $script="<script>alert('Problem XSS-Cross Site Scripting!!')</script>";
    $arreglo=['Play ','Xbox one','Wii U'];
    return view('saluda', compact('saludo','html','script','arreglo'));
}]);
*/
 //* darle nombre a la ruta

/* Route::get('contactame',['as' => 'contactanos', function () {
   return "Seccion contactame";
   return view('contacto');
}]);
*/
//* ruta con parametro
Route::get('saludar/{name}', function ($name) {
    return "Hola $name";
});


//* ruta con parametro y validar que solo acepte letras
Route::get('saludos/{name}', function ($name) {
    return "Hola $name";
})->where('name','[A-Za-z]+');


//* ruta con parametro, validar que solo acepte letras, con parametro opcional y valor predeterminado
Route::get('saludos/{name?}', function ($name="Invitado") {
    return "Hola $name";
})->where('name','[A-Za-z]+');