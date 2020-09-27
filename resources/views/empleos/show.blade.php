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
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('empleos.index')}}" class="btn btn-success float-right" style="text-align:right"><i class="fas fa-arrow-left"></i> Volver</a>
                    <h2><strong>Puesto:</strong>{{ $empleo->puesto->nombre}}</h2>
                    <strong>Fecha Convocatoria:</strong> {{ $empleo->fecha_convocatoria }}                    
                </div>
                <div class="card-body">
                    <p><strong>Empresa:</strong>{{ $empleo->empresa->nombre}}<br>
                        <strong>Area:</strong>{{ $empleo->puesto->subarea->area->nombre}}<br>
                        <strong>Sub Area:</strong>{{ $empleo->puesto->subarea->nombre}}<br>
                        <strong>Vacantes:</strong>{{ $empleo->vacantes}}<br>
                        @if ($empleo->sueldo)
                            <strong>Sueldo:</strong>{{ $empleo->sueldo}}
                        @endif
                    </p> 
                    @foreach ($empleo->detalle_publicaciones->sortBy('orden') as $r)
                        {!! $r->caracteristica !!}
                    @endforeach              
                </div>
                <div class="card-footer">
                    <p>{{ $empleo->adicional }}</p>
                </div>
            </div>
        </div>          
    </div>
</div>
@endsection
