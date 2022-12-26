@extends('adminlte::page')
@section('title', 'Crear post')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear post</h1>
        <a href="{{ route('news.content') }}" class="btn btn-sm btn-primary">ver novedades</a>
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
    <form action="{{ route('news.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <input type="hidden" name="section_id" value="9">
            <div class="form-group col-sm-12 col-md-6">
                <label for="">Título</label>
                <input type="text" name="content_1" value="{{old('content_1')}}" class="form-control" placeholder="Título del post">
            </div>    
            <div class="form-group col-sm-12 col-md-6">
                <label>Categoría</label>
                <select name="content_3" class="form-control select2">
                    <option value="Catálogo">Catálogo</option>
                    <option value="Producto">Producto</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="content_2" class="ckeditor" id="" cols="30" rows="10">{{old('content_2')}}</textarea>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>imagen card<small>386x260px</small></label>
                <input type="file" name="image" class="form-control-file">
            </div>  
            <div class="form-group col-sm-12 col-md-4">
                <label>imagen post<small>591x346px</small></label>
                <input type="file" name="image2" class="form-control-file">
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

    