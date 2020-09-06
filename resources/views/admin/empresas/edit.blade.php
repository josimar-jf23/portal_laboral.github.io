@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    
@stop

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card" style="width: 50rem;">
            <card-header><h1>Editar Usuario</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.usuarios.update',$usuario->id) }}">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="empresa_id" name="empresa_id">
                                <option value="">Seleccionar</option>
                                @foreach ($empresas as $r)
                                    <option value="{{ $r->id}}" {{ $r->id!=$usuario->empresa_id?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">            
                        <label class="col-md-4 col-form-label text-md-right" for="estado" >Activar</label>
                        <input type="checkbox" id="estado" name="estado" {{ $usuario->estado=='1'?'checked':'' }}>
                      </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Register') }}
                            </button>
                            <a href="{{ route('admin.usuarios.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop