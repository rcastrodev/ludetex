@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-6">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div> 
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="AA">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Subcategoría</label>
                <select name="sub_category_id" class="form-control select2">
                    @foreach ($subCategories as $subCategory)
                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Catálogo</label>
                <input type="file" name="extra" class="form-control-file">
            </div> 
            <div class="form-group col-sm-12">
                <label for="">Características</label>
                <textarea name="characteristic" class="ckeditor" id="" cols="30" rows="10">{{old('characteristic')}}</textarea>
            </div>   
            <div class="form-group col-sm-12">
                <label for="">Ancho</label>
                <input type="text" name="width" value="{{old('width')}}" class="form-control" placeholder="Separar por |">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Presentación y medidas</label>
                <input type="text" name="presentation_and_measurements" value="{{old('presentation_and_measurements')}}" class="form-control" placeholder="Separar por |">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Colores</label>
                <select name="colores[]" class="form-control select2"  multiple="multiple">
                    @foreach ($colores as $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

    