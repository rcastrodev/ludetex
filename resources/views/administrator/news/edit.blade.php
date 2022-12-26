@extends('adminlte::page')
@section('title', 'Editar post')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar post</h1>
        <a href="{{ route('news.content') }}" class="btn btn-sm btn-primary">ver novedades</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('news.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <div class="card-header">Post</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Título</label>
            <input type="text" name="content_1" value="{{$post->content_1}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Categoría</label>
            <select name="content_3" class="form-control select2">
                <option value="Catálogo" @if($post->content_3 == 'Catálogo') checked @endif>Catálogo</option>
                <option value="Producto" @if($post->content_3 == 'Producto') checked @endif>Producto</option>
            </select>
        </div> 
        @if ($post->content_4)
            <div class="form-group col-sm-12">
                <a href="{{ route('novedad.pdf', ['id'=>$post->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">PDF</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="destroyPDF" data-url="{{ route('content.borrar-ficha-tecnica', ['id'=> $post->id]) }}">
                </button>
            </div>          
        @endif  
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="content_2" class="ckeditor" id="" cols="30" rows="10">{{$post->content_2}}</textarea>
        </div>
        <div class="form-group col-sm-12 col-md-4 ">
            @if ($post->image)
                <div class="position-relative">
                    <button id="destroyImgContent" class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt" data-url="{{ route('content.borrar-imagen-contenido', ['id'=> $post->id]) }}"></button>
                    <img src="{{ asset($post->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>          
            @endif
            <label>imagen card <small>386x260px</small></label>
            <input type="file" name="image" class="form-control-file">
        </div>    
        <div class="form-group col-sm-12 col-md-4 ">
            @if ($post->image2)
                <div class="position-relative">
                    <button id="destroyImgContent" class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt" data-url="{{ route('content.borrar-imagen-contenido', ['id'=> $post->id]) }}"></button>
                    <img src="{{ asset($post->image2) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>          
            @endif
            <label>imagen post <small>591x346px</small></label>
            <input type="file" name="image2" class="form-control-file">
        </div>    
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('news.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        let imgContent = document.getElementById('destroyImgContent')
        if (imgContent) 
            imgContent.addEventListener('click', function(e){
                e.preventDefault();
                
                axios.post(imgContent.dataset.url).then(r =>{
                    imgContent.closest('div').remove()
                }).catch(error => console.error(error))
            })

        let imgPDF = document.getElementById('destroyPDF')
        if (imgPDF) 
        imgPDF.addEventListener('click', function(e){
                e.preventDefault();
                axios.post(imgPDF.dataset.url).then(r =>{
                    imgPDF.closest('div').remove()
                }).catch(error => console.error(error))
            })
    </script>
@stop

