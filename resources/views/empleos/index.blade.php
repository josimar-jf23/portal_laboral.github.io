@extends('layouts.app')

@section('css_part')

<link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}">

<style>
    .card{
        border-radius: 2px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
          transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
      padding: 1px 1px 1px 1px;
      cursor: pointer;
    }
    
    .card:hover{
         transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
    }
    
</style>
@endsection

@section('content')
<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId            : '338089050735691',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v8.0'
      });
    };
  </script>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0&appId=338089050735691&autoLogAppEvents=1" nonce="fg4XiNS8"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <form method="GET" action="{{ route('empleos.index') }}">
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                <div class="form-group row">
                    <div class="col-md">
                        <label for="puesto_id" class="col-form-label text-md-right">Puestos</label>
                        <select class="form-control" id="puesto_id" name="puesto_id">
                            <option value="" selected>Seleccionar</option>
                            @foreach ($puestos as $r)
                                <option value="{{ $r->id}}" {{ ($puesto_id==$r->id) ? 'selected' : '' }}>{{ $r->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="empresa_id" class="col-form-label text-md-right">Empresas</label>
                        <select class="form-control" id="empresa_id" name="empresa_id">
                            <option value="" selected>Seleccionar</option>
                            @foreach ($empresas as $r)
                                <option value="{{ $r->id}}" {{ ($empresa_id==$r->id) ? 'selected' : '' }}>{{ $r->nombre}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-md">
                        <!--
                        <label for="fecha_convocatoria" class="col-form-label text-md-right">Fecha Convocatoria</label>
                        <input id="fecha_convocatoria" type="date" value="{{$fecha_convocatoria}}" class="form-control" name="fecha_convocatoria"> 
                        -->
                        <label for="mes_convocatoria" class="col-form-label text-md-right">Mes </label>
                        <select class="form-control" id="mes_convocatoria" name="mes_convocatoria">
                            <option value="" selected>Seleccionar</option>
                            @foreach ($meses as $r)
                            <option value="{{ $r->mes}}" {{ ($mes_convocatoria==$r->mes) ? 'selected' : '' }}>
                                @php
                                    switch( $r->mes ) {
                                        case '01': echo 'Enero'; break;
                                        case '02': echo 'Febrero'; break;
                                        case '03': echo 'Marzo'; break;
                                        case '04': echo 'Abril'; break;
                                        case '05': echo 'Mayo'; break;
                                        case '06': echo 'Junio'; break;
                                        case '07': echo 'Julio'; break;
                                        case '08': echo 'Agosto'; break;
                                        case '09': echo 'Setiembre'; break;
                                        case '10': echo 'Octubre'; break;
                                        case '11': echo 'Noviembre'; break;
                                        case '12': echo 'Diciembre'; break;
                                    }
                                @endphp
                            </option>
                            @endforeach                          
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="anio_convocatoria" class="col-form-label text-md-right">Año</label>
                        <select class="form-control" id="anio_convocatoria" name="anio_convocatoria">
                            <option value="" selected>Seleccionar</option>
                            @foreach ($anios as $r)
                                <option value="{{ $r->anio}}" {{ ($anio_convocatoria==$r->anio) ? 'selected' : '' }}>{{ $r->anio}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-md">
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <button type="submit" class="btn btn-success" title="Buscar">
                                Buscar
                            </button>
                            <a class="btn btn-info" href="{{ route('empleos.index')}}">Limpiar</a>
                            
                            
                        </div>                                                                                            
                    </div>
                    <!--
                    <div class="col-md" style="display: flex;justify-content: flex-start; align-items: flex-end;height: auto; ">
                        <button type="submit" class="btn btn-success" title="Buscar">
                            Buscar
                        </button>
                        <a class="btn btn-info" href="{{ route('empleos.index')}}">Limpiar</a>                                              
                    </div>
                    -->
                </div>
            </form>
        </div>
    </div>
    @if(Session::has('flash_message'))
        <div class="row justify-content-center">
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
                <em> {!! session('flash_message') !!}</em>
            </div>
        </div>       
    @endif
    @if ($errors->any())
        <div class="row justify-content-center">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span>
                <em> <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul></em>
            </div>
        </div>
    @endif
    <div class="row justify-content-center">  
        <div class="card-columns">
        @foreach ($empleos as $r)
                <!--<div class="col-md-4"> -->               
                    <div class="card" >
                        <div class="card-header">                            
                            <div class="row">
                                <div class="col">
                                    <h2><strong>Labor:</strong>{{ $r->puesto->nombre}}</h2>
                                    <strong>Fecha Convocatoria:</strong> {{ date('d / m / Y',strtotime($r->fecha_convocatoria)) }}
                                </div>
                            </div>
                            
                            <!--<a href="#" class="btn btn-success float-right" style="text-align:right" data-toggle="tooltip" title="Postular!" onclick="suscripcion({{ $r->id }})"><i class="fas fa-thumbs-up"></i></a>-->
                                                        
                        </div>
                        <div class="card-body">
                            <p><strong>Empresa:</strong>{{ $r->empresa->nombre}}<br>
                                <strong>Vacantes:</strong>{{ $r->vacantes}}<br>
                                @if ($r->sueldo)
                                    <strong>Sueldo:</strong>{{ $r->sueldo}}
                                @endif
                            </p> 
                            <p><a href="{{ route('empleos.show',$r->id)}}">Leer mas...</a></p>                                                   
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                
                                <div class="col">
                                    <a href="#" class="btn btn-success float-right" style="text-align:center" title="Postular!" onclick="suscripcion({{ $r->id }})">Postular</a>
                                </div>                             
                            </div>
                            <!--<p>{{ $r->adicional }}</p>-->
                        </div>
                    </div>
                <!-- </div>-->
            @endforeach   
        </div>         
    </div>
    <div class="row justify-content-center">{{ $empleos->links() }}</div>
    
</div>
<div class="modal fade" id="vista_previa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body" id="v_previa_body">
                <form method="POST" action="{{ route('suscriptores.store') }}">
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row">
                        <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode === 39)" required>
                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos <span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))" required>
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dni" class="col-md-4 col-form-label text-md-right">Dni<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" maxlength="8" name="dni" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="" required>
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular" class="col-md-4 col-form-label text-md-right">Celular<span style="color:red">*</span></label>

                        <div class="col-md-6">
                            <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="" required>
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
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="">
                            <input id="publicacion_id" type="hidden" name="publicacion_id" value="">
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
                            <a href="{{ route('admin.subareas.index')}}" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_part')
<script src="{{asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });
    </script>
    <script>
        function suscripcion(valor) {
            $("#vista_previa").modal("show");
            $("#publicacion_id").val(valor);
          }
    </script>
    <script>

    </script>
@endsection
