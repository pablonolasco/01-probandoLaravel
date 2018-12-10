@extends('template')

@section('contenido')

    <div class="container">
        <h1 class="text-center my-4">Todos los contactos</h1>
       
        <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pwd</th>
                    <th scope="col">Fecha Update</th>
                    
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                        @foreach ($messages as $message)
                        <tr>
                              <th scope="row">{{$message->id}}</th>
                              <td><a href="{{ route('messages.show',$message->id)}} ">{{$message->email}}</a></td>
                              <td>{{$message->pwd}}</td>
                              <td>{{$message->updated_at}}</td>
                              
                              <td class="d-block">
                                <a href="{{ route('messages.edit',$message->id)}}" class="badge badge-primary">Editar</a>

                    <form  method="POST" action="{{ route('messages.destroy',$message->id)}}">
                                   
                              {!!csrf_field()!!}
                              {{ method_field('DELETE')}}
               
               <button type="submit" class="btn btn-danger">Eliminar</button>                                </form>
                              </td>
                            </tr>
                               
                        @endforeach
                   
                </tbody>
              </table>
    </div>
@stop