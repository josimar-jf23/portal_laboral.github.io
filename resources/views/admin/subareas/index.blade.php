@extends('adminlte::page')

@section('title', 'Sub Area')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>{{ $area->nombre}}</h1>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('admin.subareas.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.areas.index')}}" class="btn btn-success float-right" style="text-align:right"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! session()->get('error') !!}
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_subareas">
                    <thead class="thead-dark">
                        <th>Nro</th>  
                        <th>Area</th>                      
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                    </thead>
                    <tbody>                    
                        @foreach ($subareas as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $r->area->nombre}}</td>                             
                                <td>{{ $r->nombre}}</td>
                                <td>{{ $r->descripcion}}</td>
                                <td><table class="table-sm table-borderless">
                                    <tr>
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.subareas.edit',$r->id)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" action="{{ url('/admin/subareas', ['id' => $r->id]) }}" method="post">
                                                
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
        $('#table_subareas').DataTable({
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