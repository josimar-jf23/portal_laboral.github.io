@extends('adminlte::page')

@section('title', 'Nuevo Atributo')
@section('plugins.Ckeditor',true)
@section('content_header')
    
@stop

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card" style="width: 50rem;">
            <card-header><h1>Nueva Atributo</h1></card-header>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.detalle_publicaciones.store') }}">
                    <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group row"> 
                        <div class="col-md-4"></div>                       
                        <div class="col-md-6">
                            <label for="caracteristica" class="col-form-label text-md-right">Contenido<span style="color:red">*</span></label>
                            <textarea id="caracteristica" name="caracteristica" class="@error('caracteristica') is-invalid @enderror"  placeholder="Enter text ..." value="" required>  
                            </textarea>
                            @error('caracteristica')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <label for="orden" class="col-form-label text-md-right">Orden</label>
                            <input id="orden" type="text" class="form-control @error('orden') is-invalid @enderror" name="orden" value="">
                            @error('orden')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Agregar
                            </button>
                            <a href="{{ route('admin.detalle_publicaciones.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
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
        CKEDITOR.replace('caracteristica',{
            language: 'es',
            uiColor: '#dc3545',
            toolbar: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source',] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Underline','-', 'RemoveFormat' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                { name: 'links', items: [ 'Link'] },
                '/',
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                
                { name: 'others', items: [ '-' ] },
            ]
        });
      </script>
@stop