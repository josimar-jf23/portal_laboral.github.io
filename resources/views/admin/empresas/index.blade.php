@extends('adminlte::page')

@section('title', 'Empresas')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h1>Empresas</h1>
            <a href="{{ route('admin.empresas.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_empresas">
                    <thead class="thead-dark">
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Tipo Doc</th>
                        <th>Num Doc</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Rumbro</th>
                        <th>Descripcion</th>
                        <th></th>
                    </thead>
                    <tbody>                    
                        @foreach ($empresas as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->nombre}}</td>
                                <td>{{ ($r->tipo_doc!='')?(($r->tipo_doc!='0')?'DNI':'RUC'):'-'}}</td>
                                <td>{{ ($r->num_doc!='')?$r->num_doc:'-'}}</td>
                                <td>{{ $r->telefono}}</td>
                                <td>{{ $r->direccion}}</td>
                                <td>{{ $r->ciudad->nombre}}</td>
                                <td>{{ $r->rubro->nombre}}</td>
                                <td>{{ $r->descripcion}}</td>
                                <td><table class="table-sm table-borderless">
                                    <tr>                                        
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.empresas.edit',$r->id)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" action="{{ url('/admin/empresas', ['id' => $r->id]) }}" method="post">
                                                
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
        $('#table_empresas').DataTable({
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