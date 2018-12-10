@extends('template')
@section('tittle','Saludando')
@section('contenido')
  <h1>  {{$saludo}}</h1>

  @if ($edad>=18)
      <p>Es mayor de edad</p>
  @else
  <p>Es menor de edad</p>
  @endif

  <hr>
  @for ($i = 0; $i < count($arreglo); $i++)
      <p>{{$arreglo[$i]}}</p>
  @endfor
  @forelse ($arregloVacio as $item)
      {{$item}}
  @empty
      <p>No hay datos</p>
  @endforelse
  <?php $f=0;?>
  @while ($f<10)
      <p>{{$f}}</p>
     <?php ++$f;?>
  @endwhile

@stop