@extends('adminlte::page')

@section('title', 'Editar Rubro')

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
            <card-header><h1>Editar Rubro</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.rubros.update',$rubro->id) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                                  
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $rubro->nombre }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $rubro->descripcion }}" >
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">Estado<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="" selected>Seleccionar</option>
                                <option value="0" {{ ($rubro->estado =='0')?'selected':'' }}>Desactivo</option>
                                <option value="1" {{ ($rubro->estado =='1')?'selected':'' }}>Activo</option>
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.rubros.index')}}" class="btn btn-danger">Cancelar</a>
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