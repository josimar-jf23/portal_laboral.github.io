@extends('adminlte::page')

@section('title', 'Nueva Publicacion')

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
            <card-header><h1>Nueva Publicacion</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.publicaciones.store') }}">
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row">
                        <label for="empresa_id" class="col-md-4 col-form-label text-md-right">Empresa<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="empresa_id" name="empresa_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($empresas as $r)
                                    <option value="{{ $r->id}}">{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="area_id" class="col-md-4 col-form-label text-md-right">Area<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="area_id" name="pais_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($areas as $r)
                                    <option value="{{ $r->id}}">{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="subarea_id" class="col-md-4 col-form-label text-md-right">Sub Area<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="subarea_id" name="subarea_id" required>
                                <option value="" selected>Seleccionar</option>
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="puesto_id" class="col-md-4 col-form-label text-md-right">Puesto<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="puesto_id" name="puesto_id" required>
                                <option value="" selected>Seleccionar</option>
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="contacto_id" class="col-md-4 col-form-label text-md-right">Contacto<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="contacto_id" name="contacto_id" required>
                                <option value="" selected>Seleccionar</option>
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="fecha_convocatoria" class="col-md-4 col-form-label text-md-right">Fecha Convocatoria<span style="color:red">*</span></label>
                        <div class="col-md-6">
                            @php
                            date_default_timezone_set("America/Lima");
                            @endphp
                            <input id="fecha_convocatoria" type="date" value="{{date('Y-m-d')}}" class="form-control @error('fecha_convocatoria') is-invalid @enderror" name="fecha_convocatoria" value="" required>
                            @error('fecha_convocatoria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vacantes" class="col-md-4 col-form-label text-md-right">Vacantes<span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input id="vacantes" type="text" class="form-control @error('vacantes') is-invalid @enderror" name="vacantes" value="" required>
                            @error('vacantes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sueldo" class="col-md-4 col-form-label text-md-right">Sueldo</label>
                        <div class="col-md-6">
                            <input id="sueldo" type="text" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adicional" class="col-md-4 col-form-label text-md-right">Adicional</label>
                        <div class="col-md-6">
                            <input id="adicional" type="text" class="form-control @error('adicional') is-invalid @enderror" name="adicional" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.publicaciones.index')}}" class="btn btn-danger">Cancelar</a>
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
                        data:{accion:0,valor:area,_token:_token},
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
                    console.log('sin area');
                }                
            }); 
            $( "#subarea_id" ).change(function() {
                var subare=$('#subarea_id').val();
                var empres=$('#empresa_id').val();
                var puest=$('#puesto_id');
                var _token= $('#_token').val();
                if(subare != '' && empres!=''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch_areas')}}",
                        method:"POST",
                        data:{
                            accion:1,
                            valor:subare,
                            empresa:empres,
                            _token:_token
                        },
                        beforeSend: function(){
                            puest.prop( "disabled", true );
                          },
                        success: function(result){
                            puest.find('option').remove();
                            $("#puesto_id").append(result);
                            puest.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            puest.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin area');
                }                
            });
            $( "#empresa_id" ).change(function() {
                var subare=$('#subarea_id').val();
                var empres=$('#empresa_id').val();
                var puest=$('#puesto_id');
                var conta=$('#contacto_id');
                var _token= $('#_token').val();
                if(empres!=''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch_areas')}}",
                        method:"POST",
                        data:{
                            accion:2,
                            valor:empres,
                            _token:_token
                        },
                        beforeSend: function(){
                            conta.prop( "disabled", true );
                          },
                        success: function(result){
                            conta.find('option').remove();
                            $("#contacto_id").append(result);
                            conta.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            conta.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin puesto');
                } 
                if(subare != '' && empres!=''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch_areas')}}",
                        method:"POST",
                        data:{
                            accion:1,
                            valor:subare,
                            empresa:empres,
                            _token:_token
                        },
                        beforeSend: function(){
                            puest.prop( "disabled", true );
                          },
                        success: function(result){
                            puest.find('option').remove();
                            $("#puesto_id").append(result);
                            puest.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            puest.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin puesto');
                }                
            });          
        });
    </script>
@stop