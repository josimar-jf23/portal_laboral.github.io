@extends('layouts.app')

@section('css_part')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet"> 
<style>
    .contenedor{
        position: relative;
        display: inline-block;
        width:100%;
        text-align: center;
    }
    .contenedor:before {
        content:'';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0,0,0,0.4);
    }
    .arriba{
        position: absolute;
        top: 0%;
        
    }
    .centrado_top{
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%, 0%);
    }
    .centrado{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .text-xlarge{
        font-size: 50px;
        color:#ffffff;
        font-weight: bold;
        font-family: 'Roboto', sans-serif;
    }
    .text-large{
        font-size: 30px;
        color:#ffffff;
        font-weight: bold;
        font-family: 'Roboto', sans-serif;
    }
    .text-medium{
        font-size: 20px;
        font-family: 'Roboto', sans-serif;
    }
    .text-small{
        font-size: 15px;
        font-family: 'Roboto', sans-serif;
    }
    //$number-of-items: 3;
</style>
<style>
    #slider {
        overflow: hidden;
    }
    #slider figure {
        position: relative;
        width: 500%;
        margin: 0;
        left: 0;
        animation: 30s slider infinite;
        text-align: center;
    }
     #slider .contenedor_sliders:before {
        content:'';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0,0,0,0.3);
    }
    #slider figure #sliders {
        width: 20%;
        float: left;
    }
    .contenedor_sliders{
        position: relative;
        width: 100%;
        display: inline-block;
        text-align: center;
    }
    .centrado_sliders{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    @keyframes slider {
        0% { left: 0;}
        15% {left: -0%;}
        25% {left: -100%;}
        35% {left: -100%;}
        45% {left: -200%;}
        55% {left: -200%;}
        65% {left: -300%;}
        75% {left: -300%;}
        85% {left: -400%;}
        100% {left: -400%;}
    }
</style>

@endsection
@section('js_part')
<script src="{{asset('/vendor/jquery/jquery.min.js') }}"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div id="slider">
		<figure>
            <div id="sliders" width="100%" height="550px">
                <div class="contenedor_sliders">
                    <img src="{{asset('imagenes/carrusel/labor1.jpg')}}" alt="uvas vinos" width="100%" height="550px">
                    <div class="centrado_sliders"><span class="text-large">Empresas agroexportadoras de uvas, citricos, arandanos y mas te están buscando!<br><a href="{{ route('empleos.index')}}">Empleos Aquí</a></span> </div>
                </div>
            </div>
            <div id="sliders" width="100%" height="550px">
                <div class="contenedor_sliders">
                    <img src="{{asset('imagenes/carrusel/labor3.jpg')}}" alt="uvas vinos" width="100%" height="550px">
                    <div class="centrado_sliders"><span class="text-large">Encuentra la labor agraria a tu medida <br><a href="{{ route('empleos.index')}}">Empleos Aquí</a></span> </div>
                </div>
            </div>
            <div id="sliders" width="100%" height="550px">
                <div class="contenedor_sliders">
                    <img src="{{asset('imagenes/carrusel/labor4.jpg')}}" alt="uvas vinos" width="100%" height="550px">
                    <div class="centrado_sliders"><span class="text-large">Encuentra trabajo en Campo o en Packing con nosotros! <br><a href="{{ route('empleos.index')}}">Empleos Aquí</a></span> </div>
                </div>
            </div>
            <div id="sliders" width="100%" height="550px">
                <div class="contenedor_sliders">
                    <img src="{{asset('imagenes/carrusel/labor5.jpg')}}" alt="uvas vinos" width="100%" height="550px">
                    <div class="centrado_sliders"><span class="text-large">Trabaja directo en el sector agrario sin intermediarios <br><a href="{{ route('empleos.index')}}">Empleos Aquí</a></span> </div>
                </div>
            </div>
            <div id="sliders" width="100%" height="550px">
                <div class="contenedor_sliders">
                    <img src="{{asset('imagenes/carrusel/labor6.jpg')}}" alt="uvas vinos" width="100%" height="550px">
                    <div class="centrado_sliders"><span class="text-large">Trabaja en el sector agrario todo el año! <br><a href="{{ route('empleos.index')}}">Empleos Aquí</a></span> </div>
                </div>
            </div>		
		</figure>
	</div>
    <div class="row justify-content-center">    
        <div class="col-12; text-align: center;">
            <p class="text-large" style="color:#000000;text-align: center;">Te damos la bienvenida a <strong>Labor</strong> Agro</p>
        </div>
    </div>
    
    <div class="row justify-content-center"> 
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center;">
            <hr class="dashed">
            <p class="text-medium">Mediante este portal podemos unir la basta oferta laboral existente en el sector 
                agrícola con la demanda que crece cada año, gracias a la mejora en la productividad de los 
                cultivos, logrando un balance entre oferta y demanda, propiciando que las personas interesadas 
                puedan tener un ingreso fijo y las empresas puedan tener la dotación de gente necesaria para ambos 
                beneficiarse durante todo el año.</p>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="contenedor">
            <img src="{{asset('imagenes/carrusel/labor2.jpg')}}" alt="uvas vinos" width="100%" height="400px">
            <div class="arriba" style="text-align: center;">
                
            </div>
            <div class="centrado">
                <div class="row">                    
                    <div class="col-md-12">
                        <span class="text-large">EMPRESAS QUE CONFÍAN EN NOSOTROS</span>                        
                    </div>                    
                </div>
                <!--
                <div class="row">                    
                    <div class="col-md-12">
                        <p class="text-small" style="color:#ffffff">SI ESTAS EN EL SECTOR AGRARIO PUBLICAMOS TU OFERTA LABORAL AQUI. CONTACTATE CON NOSOTROS.</p>
                    </div>                    
                </div>
                -->
            </div>
        </div>        
    </div>    
    <div class="row"> 
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center;">
            <hr class="dashed">
            <div class="row"> 
                <div class="col-md-4"></div>
                <div class="col-md-4"><img src="{{asset('imagenes/carrusel/rvr-agro.png')}}" alt="uvas" width="100px" height="100px" style="filter: contrast(200%);"></div>
                <div class="col-md-4"></div>                
            <hr class="dashed">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row"> 
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center;">
            <hr class="dashed">
            <div class="row"> 
                <!--<p class="text-small" style="color:#000000">SI TE ENCUENTRAS DENTRO DEL RUBRO DE PEQUEÑA, MEDIANA O GRAN EMPRESA PUBLICA TUS OFERTAS LABORALES CON NOSOTROS.</p>-->
            <hr class="dashed">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row justify-content-center"> 
        
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center;">
            <div class="row">
                <div class="col">
                    <p class="text-small" style="color:#000000">
                        <span style="font-weight: bold;">Horario Atencion</span><br>
                        Dom:cerrado <br>
                        Lun - Sab:09:00h - 19:00h
                     </p>
                </div>
                <div class="col">
                    <p class="text-small" style="color:#000000">
                        <span style="font-weight: bold;">Ubicación</span><br>
                        Ica <br>
                        Ica,Ica(10100)                        
                     </p>
                </div>
                <div class="col">
                    <p class="text-small" style="color:#000000">
                        <span style="font-weight: bold;">Contactanos</span><br>
                        Telf:951403694 <br>
                        Email:
                     </p>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
