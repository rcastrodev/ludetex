@extends('adminlte::page')
@section('title', 'Producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Producto</h1>
        <a href="{{ route('product.content.create') }}" class="btn btn-sm btn-primary">crear producto</a>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>SubCategoría</th>
                    <th>Descripción</th>
                    <th>Orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('product.content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/product/index.js') }}"></script>
@stop

