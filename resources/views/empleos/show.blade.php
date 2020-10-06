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
@section('meta_part')
    <meta property="og:url"           content="{{ URL::to('empleos',$empleo->id)}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $empleo->empresa->nombre}}" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="{{asset('imagenes/carrusel/linea_campo.jpeg')}}" />
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
                    <p>{{ $empleo->adicional }}</p>           
                </div>
                <div class="card-footer">                 
                    <!--<iframe src="https://www.facebook.com/plugins/share_button.php?href={{ URL::to('empleos',$empleo->id)}}&layout=button&size=large&appId=338089050735691&width=103&height=28" width="103" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>-->
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href={{ URL::to('empleos',$empleo->id)}}&layout=button_count&size=large&appId=338089050735691&width=151&height=28" width="151" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>          
    </div>
</div>
@endsection
