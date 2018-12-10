<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
class PageController extends Controller
{
    /*public function __construct(Request     $request){
        $this->request=$request;
    }*/
    public function __construct(){
        //manera correcta de mandar a ejecutar un middleware, si no se especifica a que metodo va a afectar, se agregara a todos
        //$this->middleware('example',['only' => ['home']]);
        //se añade a todos los metodos excepto a home
        //los middleware se encargan de verificar los request, si la condicion se cumple deja pasar el request sino lo regresa
        $this->middleware('example',['except' => ['home']]);
    }
    public function home(){

        return response('Contenido de la respuesta',201)
        ->header('X-Token','token')
        ->header('X-Token2','token2');
        //->cache('X-cache','cache');
        //coockie se encripta
    }

    public function contacto(){
        return view('contacto');
    }

    public function mensaje(Request $request){
   //     public function mensaje(App\Http\Requests\CreateMessageRequest $request){
    
        //ver validaciones https://laravel.com/docs/5.7/validation, https://laravel.com/docs/5.7/validation#using-rule-obje cts
        //validacion del lado del servidor mediante la clase  ValidatesRequests que esta en la clase controller
        //Duplicar carpeta en y renombrar por es, cambiar la config del proyecto
        //config/app.php => 'locale' => 'es'
        //cambiar el idioma de los mensajes, resources/lang/en/validation.php
        //descargar validate.php report https://github.com/caouecs/Laravel-lang/tree/master/src
        // para formularios pequeños se usa de esta manera, en caso contrario crear un archivo Http/Requests/ ValidarRequest.php
       /* $this->validate($request,[
            'pwd' => 'required',
            'email' => 'email | required | min:5'
        ]);*/
            //min:5 minimo 5 letras
                 //min:5 minimo 5 letras
            
        //cuando se crea el Request, solo se envia la respuesta
        //redireccion 302
        $data=$request->all();
        //redirecion home
        //return redirect('/');
        //redirecion a una ruta
        //return redirect()->route('saludos');
        //envio session, pero solo existe al redireccionar despues se elimina al actualizar el navegador
        /*return redirect()
            ->route('contactanos')
            ->with('info', 'Tu mensaje ha sido enviado correctamente.');
        */
        //regresar a la anterior agina
        return back()
            ->with('info', 'Tu mensaje ha sido enviado correctamente.');
            //tiene pwd 
       // if($request->has('pwd')){
         /*   //regresa valor
            return $request->input("pwd");
        }else{
            return 'no tiene pwd';
        }
        return $request->all();*/

    }

    public function saluda($saludo='invitado'){
        $html="<h2>Contenido</h2>";
        $edad=18;
        $script="<script>alert('Problem XSS-Cross Site Scripting!!')</script>";
        $arreglo=['Play ','Xbox one','Wii U'];
        $arregloVacio=[];
        return view('saluda', compact('saludo','html','script','arreglo','edad','arregloVacio'));
    }
}
