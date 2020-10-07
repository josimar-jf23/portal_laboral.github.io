@extends('adminlte::page')
@section('plugins.Chartjs',true)
@section('title', 'Dashboard')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row">
    <h2>Dashboards</h2>
</div>
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>TOTAL DE SUSCRIPTOS POR MES</b></div>
                <div class="panel-body">
                    <canvas id="myChart1" height="100" width="400"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        var ctx = document.getElementById('myChart1');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($contador_suscripciones as $r)
                    
                    @php
                        $nom_mes='';
                        switch( $r->meses ) {
                            case '01': $nom_mes= 'Enero'; break;case '02': $nom_mes= 'Febrero'; break;case '03': $nom_mes= 'Marzo'; break;
                            case '04': $nom_mes= 'Abril'; break;case '05': $nom_mes= 'Mayo'; break;case '06': $nom_mes= 'Junio'; break;
                            case '07': $nom_mes= 'Julio'; break;case '08': $nom_mes= 'Agosto'; break;case '09': $nom_mes= 'Setiembre'; break;
                            case '10': $nom_mes= 'Octubre'; break;case '11': $nom_mes= 'Noviembre'; break;case '12': $nom_mes= 'Diciembre'; break;
                        }
                    @endphp
                    ' {{ $nom_mes }} - {{$r->anios}}',
                    @endforeach
                    ],
                datasets: [
                    @foreach ($contador_suscripciones as $r)
                        {                        
                            label: 
                                @php
                                    $nom_mes='';
                                    switch( $r->meses ) {
                                        case '01': $nom_mes= 'Enero'; break;case '02': $nom_mes= 'Febrero'; break;case '03': $nom_mes= 'Marzo'; break;
                                        case '04': $nom_mes= 'Abril'; break;case '05': $nom_mes= 'Mayo'; break;case '06': $nom_mes= 'Junio'; break;
                                        case '07': $nom_mes= 'Julio'; break;case '08': $nom_mes= 'Agosto'; break;case '09': $nom_mes= 'Setiembre'; break;
                                        case '10': $nom_mes= 'Octubre'; break;case '11': $nom_mes= 'Noviembre'; break;case '12': $nom_mes= 'Diciembre'; break;
                                    }
                                @endphp
                                ' {{ $nom_mes }} - {{$r->anios}}'
                            ,
                            data: [{{ $r->total }}],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },
                    @endforeach                    
                    ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@stop