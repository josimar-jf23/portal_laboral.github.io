@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Usuarios</h1>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Emmail</th>
                        <th>Celular</th>
                        <th>Tipo</th>
                        <th>Empresa</th>
                        <th>Estado</th>
                        <th>Activar</th>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $r)
                            <tr>
                                <td>{{ $r->id}}</td>
                                <td>{{ $r->name}}</td>
                                <td>{{ $r->email}}</td>
                                <td>{{ $r->celular}}</td>
                                <td>{{ $r->tipo=='0'?'Cliente':'Admin'}}</td>
                                <td>{{ $r->empresa->nombre}}</td>
                                <td>{{ $r->estado=='0'?'Inactivo':'Activo'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop