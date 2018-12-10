<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Sirve para especificar cuales son las columnas de las tablas a insertar
    protected $fillable=['email','pwd'];
}
