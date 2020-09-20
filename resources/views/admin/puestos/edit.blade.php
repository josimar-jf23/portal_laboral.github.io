@extends('adminlte::page')

@section('title', 'Nuevo Contacto')

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
            <card-header><h1>Nuevo Contacto</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.contactos.update',$contacto->id) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row">
                        <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="empresa_id" name="empresa_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($empresas as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$contacto->empresa_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $contacto->nombre }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular" class="col-md-4 col-form-label text-md-right">Celular<span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $contacto->celular }}" required>
                            @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $contacto->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.contactos.index')}}" class="btn btn-danger">Cancelar</a>
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