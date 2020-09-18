@extends('layouts.app')

@section('css_part')
    <style>
        .carousel-inner{
            width:100%;
            max-height: 200px !important;
       }
       .carousel-caption {
        position: absolute;
        right: 15%;
        left: 15%;
        z-index: 5;
        padding-top: 10px;
        padding-bottom: 10px;
        color: #fff;
        text-align: center;
        top: 20%;
        transform: translateY(-50%);
        bottom: auto;
        background-color: rgba(240, 224, 224, 0.5);
    }
    </style>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="carrusel_titulo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                <li data-target="#carrusel_titulo" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel_titulo" data-slide-to="1"></li>
                </ul>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('imagenes/carrusel/uvas.jpg')}}" alt="Los Angeles" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3 style="color: rgb(0, 0, 0);">Te ayudamos a encontrar el trabajo adecuado, muchas empresas necesitan de tu talento </h3>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="{{asset('imagenes/carrusel/uvas2.jpg')}}" alt="Chicago" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3 style="color: rgb(0, 0, 0);">Te ayudamos a encontrar el trabajo adecuado, muchas empresas necesitan de tu talento </h3>
                    </div>   
                </div>
                </div>
                <a class="carousel-control-prev" href="#carrusel_titulo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carrusel_titulo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Te damos la bienvenida a Portal Laboral</div>

                <div class="card-body">
                    <p>Mediante este portal podemos unir la basta oferta laboral existente en el sector 
                        agrícola con la demanda que crece cada año, gracias a la mejora en la productividad de los 
                        cultivos, logrando un balance entre oferta y demanda, propiciando que las personas interesadas 
                        puedan tener un ingreso fijo y las empresas puedan tener la dotación de gente necesaria para ambos 
                        beneficiarse durante todo el año.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="carrusel_cuerpo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                <li data-target="#carrusel_cuerpo" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel_cuerpo" data-slide-to="1"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('imagenes/carrusel/uvas.jpg')}}" alt="Los Angeles" width="1100" height="500">
                        <div class="carousel-caption">
                            <h2 style="color: rgb(0, 0, 0);"> Descubre nuestras ofertas laborables</h2>  
                        </div>   
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel/uvas2.jpg')}}" alt="Chicago" width="1100" height="500">
                        <div class="carousel-caption">
                            <h2 style="color: rgb(0, 0, 0);"> Descubre nuestras ofertas laborables</h2>     
                        </div>   
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carrusel_cuerpo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#carrusel_cuerpo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>En nuestro sitio web podrás conocer las ofertas laborales mas 
                        actuales y poder elegir la que mejor se adecue a tu perfil laboral.
                        ¡No olvides que tu trabajo contribuye al desarrollo del País!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>EMPRESAS QUE CONFÍAN EN NOSOTROS</h2>
                </div>
                <div class="card-body">
                    <p>SI TE ENCUENTRAS DENTRO DEL RUBRO DE PEQUEÑA, MEDIANA O GRAN EMPRESA PUBLICA TUS OFERTAS LABORALES CON NOSOTROS.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
