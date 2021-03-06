@extends('layouts.plantilla')

@section('title', 'Dar de alta tarea')

@section('contenido')
    <!-- Botones de direccion -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/tarea" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="flaticon-left-arrow"></i>
            </span>
            <span class="text">Regresar</span>
        </a>
    </div>

    <div class="row">
        <!-- Formulario -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ingrese los datos</div>
                </div>
                <div class="card-body">
                    <form action="/tarea" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input class="form-control" type="text" value="{{old('nombre')}}" name="nombre">
                            @error('nombre')
                                <code>{{$message}}</code>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <input class="form-control" type="text" value="{{old('descripcion')}}" name="descripcion" >
                            @error('descripcion')
                                <code>{{$message}}</code>
                            @enderror
                        </div>
                
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Estatus</label>
                                <input class="form-control" type="text" name="estatus" value="inicio" readonly>
                                @error('estatus')
                                    <code>{{$message}}</code>
                                @enderror
                            </div>
                    
                            <div class="form-group col-md-6">
                                <label for="">Usuario</label>
                                <select class="form-control input-square" name="id_usuario">
                                    <option value="{{old('id_usuario')}}">--Por favor selecciona el empleado--</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}"> {{$usuario->name}} -- {{$usuario->descripcion}}</option>
                                    @endforeach
                                </select>
                                @error('id_usuario')
                                    <code>{{$message}}</code>
                                @enderror
                            </div>
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>            
        </div>
        
        <!-- Mensaje -->
        <div class="col-md-4">
            @include('mensajes.error')
        </div>
    </div> 
@endsection