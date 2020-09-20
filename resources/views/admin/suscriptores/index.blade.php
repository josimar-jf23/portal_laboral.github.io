@extends('adminlte::page')

@section('title', 'Suscripciones')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>Suscripciones</h1>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! session()->get('error') !!}
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_suscripciones">
                    <thead class="thead-dark">
                        <th>Nro</th>
                        <th>DNI</th>                      
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Publicacion</th>
                    </thead>
                    <tbody>                    
                        @foreach ($suscriptores as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->dni}}</td>                              
                                <td>{{ $r->nombre}}</td>
                                <td>{{ $r->apellidos}}</td>
                                <td>{{ $r->email}}</td>
                                <td>{{ $r->celular}}</td>
                                <td>{{ $r->publicacion->puesto->nombre}}</td>
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
        $('#table_suscripciones').DataTable({
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