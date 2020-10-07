@extends('adminlte::page')
@section('plugins.Chartjs',true)
@section('title', 'Dashboard')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Charts</b></div>
                <div class="panel-body">
                    <canvas id="myChart" height="100" width="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Charts</b></div>
                <div class="panel-body">
                    <canvas id="myChart" height="100" width="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid soluta nemo deserunt, nihil illum ipsum sapiente pariatur? Molestias, at ab praesentium ratione et eos accusamus corporis similique rem deleniti ipsum.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid soluta nemo deserunt, nihil illum ipsum sapiente pariatur? Molestias, at ab praesentium ratione et eos accusamus corporis similique rem deleniti ipsum.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid soluta nemo deserunt, nihil illum ipsum sapiente pariatur? Molestias, at ab praesentium ratione et eos accusamus corporis similique rem deleniti ipsum.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid soluta nemo deserunt, nihil illum ipsum sapiente pariatur? Molestias, at ab praesentium ratione et eos accusamus corporis similique rem deleniti ipsum.</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
                }]
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