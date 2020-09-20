@extends('adminlte::page')

@section('title', 'Nuevo Puesto')

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
            <card-header><h1>Nuevo Puesto</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.puestos.update',$puesto->id) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row">
                        <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="empresa_id" name="empresa_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($empresas as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$puesto->empresa_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="area_id" class="col-md-4 col-form-label text-md-right">Area<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="area_id" name="area_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($areas as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$puesto->subarea->area_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="subarea_id" class="col-md-4 col-form-label text-md-right">Sub Area<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="subarea_id" name="subarea_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($subareas as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$puesto->subarea_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach 
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $puesto->nombre }}" required>
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
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $puesto->descripcion }}" required>
                            @error('descripcion')
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
                            <a href="{{ route('admin.puestos.index')}}" class="btn btn-danger">Cancelar</a>
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
    <script>
        $(function(){
            $( "#area_id" ).change(function() {
                var area=$('#area_id').val();
                var subarea=$('#subarea_id');
                var _token= $('#_token').val();
                if(area != ''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch_areas')}}",
                        method:"POST",
                        data:{valor:area,_token:_token},
                        beforeSend: function(){
                            subarea.prop( "disabled", true );
                          },
                        success: function(result){
                            subarea.find('option').remove();
                            $("#subarea_id").append(result);
                            subarea.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            subarea.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin subareas');
                }                
            });         
        });
    </script>
@stop