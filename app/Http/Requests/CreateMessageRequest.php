<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMessageRequest extends Request
{
    //
    public function authorize(){
        return true;
    }

    public function rules(){
        //regresa reglas de validacion
        return [
            'pwd' => 'required',
            'email' => 'email | required | min:5'
        ];
    }

}
