@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
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
@stop