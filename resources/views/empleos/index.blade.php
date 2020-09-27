@extends('layouts.app')

@section('css_part')

<link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}">
@endsection
@section('script_part')
<script src="{{asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });
    </script>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach ($empleos as $r)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('empleos.index')}}" class="btn btn-success float-right" style="text-align:right" data-toggle="tooltip" title="Postular!"><i class="fas fa-thumbs-up"></i></a>
                            <h2><strong>Puesto:</strong>{{ $r->puesto->nombre}}</h2>
                            <strong>Fecha Convocatoria:</strong> {{ $r->fecha_convocatoria }}
                        </div>
                        <div class="card-body">
                            <p><strong>Empresa:</strong>{{ $r->empresa->nombre}}<br>
                                <strong>Area:</strong>{{ $r->puesto->subarea->area->nombre}}<br>
                                <strong>Sub Area:</strong>{{ $r->puesto->subarea->nombre}}<br>
                                <strong>Vacantes:</strong>{{ $r->vacantes}}<br>
                                @if ($r->sueldo)
                                    <strong>Sueldo:</strong>{{ $r->sueldo}}
                                @endif
                            </p>                            
                            @if(count($r->detalle_publicaciones)>0)
                                <p><a href="{{ route('empleos.show',$r->id)}}">Leer mas...</a></p>
                            @endif                        
                        </div>
                        <div class="card-footer">
                            <p>{{ $r->adicional }}</p>
                        </div>
                    </div>
                </div>
            @endforeach 
            {{ $empleos->links() }}            
    </div>
</div>
@endsection
