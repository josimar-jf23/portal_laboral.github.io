@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>Usuarios</h1>
            <a href="{{ route('admin.usuarios.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_usuarios">
                    <thead class="thead-dark">
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Emmail</th>
                        <th>Celular</th>
                        <th>Tipo</th>
                        <th>Empresa</th>
                        <!--<th>Estado</th>-->
                        <th></th>
                    </thead>
                    <tbody>
                                                
                        @foreach ($usuarios as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->name}}</td>
                                <td>{{ $r->email}}</td>
                                <td>{{ $r->celular}}</td>
                                <td>{{ $r->tipo=='0'?'Cliente':'Admin'}}</td>
                                <td>{{ $r->empresa->nombre}}</td>
                                <!--<td>{{ $r->estado=='0'?'Inactivo':'Activo'}}</td>-->
                                <td><table class="table-sm table-borderless">
                                    <tr>                                        
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.usuarios.edit',$r->id)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" action="{{ url('/admin/usuarios', ['id' => $r->id]) }}" method="post">                                                
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
        $('#table_usuarios').DataTable({
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