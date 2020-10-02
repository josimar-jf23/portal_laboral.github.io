@extends('layouts.app')

@section('css_part')
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
</style>
@endsection
@section('js_part')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">     
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="contenedor">
            <img src="{{asset('imagenes/carrusel/uvas2.jpg')}}" alt="uvas 2" width="100%" height="500px">
            <div class="texto-encima">
            </div>
            <div class="centrado"><span class="text-xlarge">Te ayudamos a encontrar el trabajo adecuado, muchas empresas necesitan de tu talento</span></div>
        </div>        
    </div>
    <div class="row justify-content-center">    
        <div class="col-12; text-align: center;">
            <span class="text-large" style="color:#000000">Te damos la bienvenida a Portal Laboral</span>
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
            <img src="{{asset('imagenes/carrusel/uvas.jpg')}}" alt="uvas" width="100%" height="500px">
            <div class="texto-encima">
            </div>
            <div class="centrado"><span class="text-large">Descubre nuestras ofertas laborables</span></div>
        </div>        
    </div>
    <div class="row justify-content-center"> 
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align: center;">
            <hr class="dashed">
            <p class="text-medium">En nuestro sitio web podrás conocer las ofertas laborales mas 
                actuales y poder elegir la que mejor se adecue a tu perfil laboral.
                ¡No olvides que tu trabajo contribuye al desarrollo del País!.</p>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="contenedor">
            <img src="{{asset('imagenes/carrusel/uvas_vino.jpg')}}" alt="uvas vinos" width="100%" height="500px">
            <div class="arriba" style="text-align: center;">
                
            </div>
            <div class="centrado_top">
                <div class="row">                    
                    <div class="col-md-12">
                        <span class="text-large">EMPRESAS QUE CONFÍAN EN NOSOTROS</span>
                        <hr style=" border-top: 1px solid  #ffffff;">
                    </div>                    
                </div>
                <div class="row">                    
                    <div class="col-md-12">
                        <p class="text-medium" style="color:#ffffff">SI TE ENCUENTRAS DENTRO DEL RUBRO DE PEQUEÑA, MEDIANA O GRAN EMPRESA PUBLICA TUS OFERTAS LABORALES CON NOSOTROS.</p>
                        <div class="row">
                            <div class="col-md-4"><img src="{{asset('imagenes/carrusel/agrokasa.png')}}" alt="uvas" width="100px" height="100px" style="filter: contrast(200%);"></div>
                            <div class="col-md-4"><img src="{{asset('imagenes/carrusel/don_ricardo.png')}}" alt="uvas" width="100px" height="100px" style="filter: contrast(200%);"></div>
                            <div class="col-md-4"><img src="{{asset('imagenes/carrusel/rvr-agro.png')}}" alt="uvas" width="100px" height="100px" style="filter: contrast(200%);"></div>
                        </div>
                    </div>                    
                </div>
                
            </div>
        </div>        
    </div>
</div>
@endsection
