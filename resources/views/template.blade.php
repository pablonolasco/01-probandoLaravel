<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-@yield('tittle')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/sass/app.scss">
</head>
<body>
    <header>
        <!--<h1>{{ request()->url()}}</h1>
        -->
        <h1>{{ request()->is('/')? 'Estas en el home':'No estas en el home'}}</h1>
        <?php
             function activeMenu($url){
                   return request()->is($url) ? 'active': ''; 
            }
        ?>
        <nav class="nav justify-content-center">
          <!--<a class="nav-link active" href="<?php echo route('home');?>">Home</a>
          <a class="nav-link" href='<?php echo route('contactanos');?>'>Contacto</a>
          <a class="nav-link" href="<?php echo route('saludos','pablo');?>">Saludo</a>
          -->
        <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
          <a class="{{ activeMenu('contactame')}}" href='{{ route('messages.create')}}'>Contacto</a>
          <a class="{{ activeMenu('saludando/*') }}" href="{{ route('saludos','pablo')}}">Saludo</a>
          <a class="{{ activeMenu('mensajes') }}" href="{{ route('messages.index')}}">Mensajes</a>
          
        </nav>
    </header>

    @yield('contenido')
    
    <footer class="my-3"> <i class="fab fa-copyright    "></i> {{ date('Y')}}</footer>
</body>
</html>