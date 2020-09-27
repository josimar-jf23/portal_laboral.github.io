@extends('adminlte::page')

@section('title', 'Detalles de Publicacion')

@section('plugins.Fontawesome',true)
@section('plugins.Datatables',true)
    
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">
            <h3> Detalles de Publicacion {{ $publicacion->puesto->nombre}} | {{ $publicacion->fecha_convocatoria}} </h3>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('admin.detalle_publicaciones.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.publicaciones.index')}}" class="btn btn-success float-right" style="text-align:right"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                {!! session()->get('error') !!}
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-sm" id="table_detalle_publicaciones">
                    <thead class="thead-dark">
                        <th>Nro</th>  
                        <th>Atributo</th>                      
                        <th>Orden</th>
                        <th></th>
                    </thead>
                    <tbody>                    
                        @foreach ($detalle_publicaciones as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td> 
                                @php 
                                    $atributo='';
                                    if(strlen($r->caracteristica)>100){$atributo= substr($r->caracteristica,0,100).'...';}
                                    else{$atributo=$r->caracteristica;}
                                @endphp
                                <td>{{$atributo}}</td>                             
                                <td>{{ $r->orden}}</td>
                                <td><table class="table-sm table-borderless">
                                    <tr>
                                        <td><input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                            <a href="#" class="btn-sm btn-success " id="v_previos" data-valor="1" onclick="f_v_previa({{ $r->id }})">
                                            Vista Previa
                                        </a></td>
                                        <td><a class="btn-sm btn-success" href="{{ route('admin.detalle_publicaciones.edit',$r->id)}}"><i class='fas fa-edit'></i></a></td>
                                        <td>
                                            <form id="myform{{$r->id}}" action="{{ url('/admin/detalle_publicaciones', ['id' => $r->id]) }}" method="post">
                                                
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
<div class="modal fade" id="vista_previa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body" id="v_previa_body">
                <div class="row">

                </div>
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
        $('#table_detalle_publicaciones').DataTable({
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
    <!--
    <script>
        $(function(){
            $("#v_previos").click(function(e){
                $("#vista_previa").modal("show");
                var _token= $('#_token').val();
                var id_detalle=$(this).attr( "data-valor" );
                var cuerpo=$('#v_previa_body');
                console.log(_token);
                console.log(id_detalle);
                $.ajax({
                    url:"{{ route('admin.detalle_publicaciones.v_previa')}}",
                    method:"POST",
                    data:{valor:id_detalle,_token:_token},
                    beforeSend: function(){
                      },
                    success: function(result){
                        cuerpo.find('div').remove();
                        var new_cuerpo='<div class="row"><div class="col">';
                            new_cuerpo+=result;
                            new_cuerpo+='</div></div>';                            
                        $("#v_previa_body").append(new_cuerpo);
                        console.log(new_cuerpo);
                    },
                    error: function(xhr,status,error){

                    }
                }); 
              });
        });
    </script> -->
    <script>
        function f_v_previa(valor) {
            $("#vista_previa").modal("show");
            var _token= $('#_token').val();
            var id_detalle=valor;
            var cuerpo=$('#v_previa_body');
            console.log(_token);
            console.log(id_detalle);
            $.ajax({
                url:"{{ route('admin.detalle_publicaciones.v_previa')}}",
                method:"POST",
                data:{valor:id_detalle,_token:_token},
                beforeSend: function(){
                    },
                success: function(result){
                    cuerpo.find('div').remove();
                    var new_cuerpo='<div class="row"><div class="col">';
                        new_cuerpo+=result;
                        new_cuerpo+='</div></div>';                            
                    $("#v_previa_body").append(new_cuerpo);
                    console.log(new_cuerpo);
                },
                error: function(xhr,status,error){

                }
            }); 
          }
    </script>
@stop