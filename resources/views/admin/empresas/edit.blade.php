@extends('adminlte::page')

@section('title', 'Nueva Emrpesa')

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
            <card-header><h1>Editar Empresa</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.empresas.update',$empresa->id) }}">
                    {{ method_field('PUT') }}
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                   
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $empresa->nombre }}" required autocomplete="nombre" autofocus>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_doc" class="col-md-4 col-form-label text-md-right">Tipo Documento<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="tipo_doc" name="tipo_doc" required>
                                <option value="">Seleccionar</option>
                                <option value="0" {{ ($empresa->tipo_doc=='0')?'selected':'' }}>Ruc</option>
                                <option value="1" {{ ($empresa->tipo_doc=='1')?'selected':'' }}>Dni</option>                                
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="num_doc" class="col-md-4 col-form-label text-md-right">Numero Documento<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="num_doc" type="text" class="form-control @error('num_doc') is-invalid @enderror" name="num_doc" value="{{ $empresa->num_doc }}" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required>
                            @error('num_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                        <div class="col-md-6">
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" maxlength="9" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="telefono" value="{{ $empresa->telefono }}" autocomplete="telefono">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                        <div class="col-md-6">
                            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" maxlength="200" name="direccion" value="{{ $empresa->direccion }}" autocomplete="direccion">
                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="200" name="descripcion" value="{{ $empresa->descripcion }}"autocomplete="descripcion">
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rubro_id" class="col-md-4 col-form-label text-md-right">Rubro<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="rubro_id" name="rubro_id" required>
                                <option value="">Seleccionar</option>
                                @foreach ($rubros as $r) 
                                    <option value="{{ $r->id}}" {{ ($r->id!=$empresa->rubro_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="pais_id" class="col-md-4 col-form-label text-md-right">Pais<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="pais_id" name="pais_id" required>
                                <option value="" selected>Seleccionar</option>
                                @foreach ($paises as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$empresa->ciudad->departamento->pais_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Departamentos<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="departamento_id" name="departamento_id" required>
                                <option value="">Seleccionar</option>
                                @foreach ($departamentos as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$empresa->ciudad->departamento_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach                              
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">Ciudades<span style="color:red">*</span></label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="ciudad_id" name="ciudad_id" required>
                                <option value="">Seleccionar</option>
                                @foreach ($ciudades as $r)
                                    <option value="{{ $r->id}}" {{ ($r->id!=$empresa->ciudad_id)?'':'selected' }}>{{ $r->nombre}}</option>
                                @endforeach                                
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.empresas.index')}}" class="btn btn-danger">Cancelar</a>
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
            $( "#pais_id" ).change(function() {
                var pais=$('#pais_id').val();
                var depart=$('#departamento_id');
                var _token= $('#_token').val();
                if(pais != ''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch')}}",
                        method:"POST",
                        data:{accion:0,valor:pais,_token:_token},
                        beforeSend: function(){
                            depart.prop( "disabled", true );
                          },
                        success: function(result){
                            depart.find('option').remove();
                            $("#departamento_id").append(result);
                            depart.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            depart.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin pais');
                }
                
            });
            $( "#departamento_id" ).change(function() {
                var depart=$('#departamento_id').val();
                var ciuda=$('#ciudad_id');
                var _token= $('#_token').val();
                if(depart != ''){
                    $.ajax({
                        url:"{{ route('dynamics.fetch')}}",
                        method:"POST",
                        data:{accion:1,valor:depart,_token:_token},
                        beforeSend: function(){
                            ciuda.prop( "disabled", true );
                            },
                        success: function(result){
                            ciuda.find('option').remove();
                            $("#ciudad_id").append(result);
                            ciuda.prop( "disabled", false );
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                            ciuda.prop( "disabled", true );
                        }
                    }); 
                }else{
                    console.log('sin pais');
                }
            
            }); 
            $( "#tipo_doc" ).change(function() {
                var tip=$('#tipo_doc').val();
                var num=$('#num_doc').val();
                if(tip=='0'){
                    $('#num_doc').prop('readonly', false);
                    $('#num_doc').attr('maxlength', '11');
                }else if(tip==1){
                    //$('#num_doc').removeProp('readonly');
                    $('#num_doc').prop('readonly', false);
                    $('#num_doc').attr('maxlength', '8');
                }else{
                    $('#num_doc').prop('readonly',true);
                }         
            
            });          
        });
    </script>
@stop