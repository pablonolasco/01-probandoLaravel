@extends('template')
@section('contenido')
    <h1>Contacto</h1>
    <!--si existe-->
    @if(session()->has('info'))
        <h3>{{ session('info') }}</h3>
    @else 
    <div class="container">
            <form method="POST" action="{{ route('messages.store')}}">
          {!!//regresa el token de la sesion en hidden
             csrf_field()
              !!}
                <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" 
                      class="form-control"
                      name="email" 
                      id="email" 
                      value="{{ old('email')}}"
                      aria-describedby="emailHelp" 
                      
                      placeholder="Enter email">
                      
                      <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" 
                      name="pwd"
                      value="{{ old('pwd')}}"
                      id="pwd" placeholder="Password"/>
                      <small id="emailHelp" class="form-text text-muted alert-danger" >{{ $errors->first('pwd') }}</small>
                     <!-- { !!$errors->first('pwd','<p>:message</p>')!! }
                     -->
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
    </div>
    @endif
@stop
