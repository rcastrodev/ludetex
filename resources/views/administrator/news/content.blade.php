@extends('adminlte::page')
@section('title', 'Novedades')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Novedades</h1>
        <a href="{{ route('news.content.create') }}" class="btn btn-sm btn-primary">crear</a>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contenido</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('news.content')}}">
    <meta name="content_find" content="{{route('news.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/news/index.js') }}"></script>
@stop

