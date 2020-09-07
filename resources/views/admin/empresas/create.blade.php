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
            <card-header><h1>Nueva Empresa</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.empresas.store') }}">
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">

                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                            <select class="form-control" id="tipo_doc" name="tipo_doc">
                                <option value="">Seleccionar</option>
                                <option value="0" {{ old('tipo_doc')?'checked':'' }}>Ruc</option>
                                <option value="1" {{ old('tipo_doc')?'checked':'' }}>Dni</option>                                
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="num_doc" class="col-md-4 col-form-label text-md-right">Tipo Documento<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="num_doc" type="text" class="form-control @error('num_doc') is-invalid @enderror" maxlength="11" name="num_doc" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"  value="{{ old('num_doc') }}" autocomplete="num_doc">
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
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" maxlength="9" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="telefono" value="{{ old('telefono') }}" autocomplete="num_doc">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" maxlength="200" name="direccion" value="{{ old('direccion') }}" autocomplete="num_doc">
                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">descripcion<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="200" name="descripcion" value="{{ old('descripcion') }}" autocomplete="num_doc">
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rubro_id" class="col-md-4 col-form-label text-md-right">Rubro</label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="rubro_id" name="rubro_id">
                                <option value="">Seleccionar</option>
                                @foreach ($rubros as $r)
                                    <option value="{{ $r->id}}">{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="pais_id" class="col-md-4 col-form-label text-md-right">Pais</label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="pais_id" name="pais_id">
                                <option value="" selected>Seleccionar</option>
                                @foreach ($paises as $r)
                                    <option value="{{ $r->id}}">{{ $r->nombre}}</option>
                                @endforeach
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Departamentos</label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="departamento_id" name="departamento_id" >
                                <option value="">Seleccionar</option>                                
                            </select>
                        </div>                       
                    </div>
                    <div class="form-group row">
                        <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">Ciudades</label>
                        <div class="col-md-6">                      
                            <select class="form-control" id="ciudad_id" name="ciudad_id">
                                <option value="">Seleccionar</option>                                
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
        });
    </script>
@stop