@extends('adminlte::page')

@section('title', 'Publicaciones')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>Publicaciones</h1>
            <a href="{{ route('admin.publicaciones.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! session()->get('error') !!}
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_publicaciones">
                    <thead class="thead-dark">
                        <th>Nro</th>                        
                        <th>Empresa</th>
                        <th>Area</th>
                        <th>Sub Area</th>
                        <th>Puesto</th>
                        <th>Contacto</th>
                        <th>Fecha Convocatoria</th>
                        <th>Vacante</th>
                        <th>Sueldo</th>                        
                        <th>Adicional</th>
                        <th>Estado</th>
                        <th></th>
                    </thead>
                    <tbody>                    
                        @foreach ($publicaciones as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>                                
                                <td>{{ $r->empresa->nombre}}</td>
                                <td>{{ $r->puesto->subarea->area->nombre}}</td>
                                <td>{{ $r->puesto->subarea->nombre}}</td>
                                <td>{{ $r->puesto->nombre}}</td>
                                <td>{{ $r->contacto->nombre}}</td>
                                <td>{{ $r->fecha_convocatoria}}</td>
                                <td>{{ $r->vacantes}}</td>
                                <td>{{ $r->sueldo}}</td>
                                @php 
                                    $adicional='';
                                    if(strlen($r->adicional)>20){$adicional= substr($r->adicional,0,20).'...';}
                                    else{$adicional=$r->adicional;}
                                @endphp
                                <td>{{$adicional}}</td>
                                <td>{{ ($r->estado!='0')?'PUBLICADO':'BORRADOR'}}</td>
                                <td><table class="table-sm table-borderless">
                                    <tr> 
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.publicaciones.show',$r->id)}}"><i class='fa fa-bars'></i> Detalle</a></td>                                         
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.publicaciones.edit',$r->id)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" action="{{ url('/admin/publicaciones', ['id' => $r->id]) }}" method="post">
                                                
                                                <a href="#" class="btn-sm btn-danger" onclick="document.getElementById('myform{{$r->id}}').submit()"><i class='fas fa-trash'></i></a>
                                                <input type="hidden" name="_method" value="delete" />
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                    </tr>
                                </table>                                                           
                                </td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> 
        $('#table_publicaciones').DataTable({
            responsive : true,
            autoWidth : false,
            "language": {
                "lengthMenu": "Mostrar"+
                                        `<select class='custom-select custom-select-sm form-control form-control-sm'>
                                            <option value='1'>1</option>
                                            <option value='10'>10</option>
                                            <option value='25'>25</option>
                                            <option value='50'>50</option>
                                            <option value='100'>100</option>
                                            <option value='-1'>Total</option>
                                        </select>`                                        
                                        +" registros por pagina",
                "zeroRecords": "No se encontro nada",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search":"Buscar:",
                "paginate":{
                    "previous":"Anterior",
                    "next":"Siguiente"
                }
            }
        });
    </script>
@stop