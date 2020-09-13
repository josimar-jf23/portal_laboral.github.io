@extends('adminlte::page')

@section('title', 'Nuevo Departamento')

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
            <card-header><h1>Nuevo Departamento</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.departamentos.update',$departamento->id) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row">
                        <label for="pais_id" class="col-md-4 col-form-label text-md-right">Pais<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="pais_id" name="pais_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($paises as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$departamento->pais_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $departamento->nombre }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ubigeo" class="col-md-4 col-form-label text-md-right">Ubigeo</label>

                        <div class="col-md-6">
                            <input id="ubigeo" type="text" class="form-control @error('ubigeo') is-invalid @enderror" name="ubigeo" value="{{ $departamento->ubigeo }}">
                            @error('ubigeo')
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
                            <a href="{{ route('admin.departamentos.index')}}" class="btn btn-danger">Cancelar</a>
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