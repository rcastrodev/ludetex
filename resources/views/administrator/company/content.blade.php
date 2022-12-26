@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
    </div>
@stop
@section('content')
@includeIf('administrator.partials.mensaje-error')
@includeIf('administrator.partials.mensaje-exitoso')
@isset($section1)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group ">
                    <input type="text" name="content_1" value="{{$section1->content_1}}" class="form-control">
                </div>
                <div class="form-group ">
                    <input type="text" name="content_2" value="{{$section1->content_2}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_3" class="ckeditor" cols="30" rows="10">{{$section1->content_3}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->exists($section1->image))
                    <div class="mb-3">
                        <img src="{{ asset($section1->image) }}" class="img-fluid" width="400" height="200">
                    </div>
                @endif
                <div class="form-group mt-2">
                    <small>imagen 606x421px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group ">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
<div class="row mb-5 pb-5">
    @isset($section3)
        <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data" class="col-sm-12 col-md-4">
            @csrf
            <input type="hidden" name="id" value="{{$section3->id}}">
            <div class="">
                @if (Storage::disk('custom')->exists($section3->image))
                    <div class="mb-3">
                        <img src="{{ asset($section3->image) }}" class="img-fluid" width="400" height="200">
                    </div>
                @endif
                <div class="form-group mt-2">
                    <small>imagen 590x600px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <button class="btn btn-primary">Actualizar</button>
        </form>  
    @endisset
    <div class="col-sm-12 col-md-7">
        <div class="d-flex">
            <h4 class="mr-3">{{$section2->content_1}}</h4>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
        </div>
        <div class="row mb-5">
            <div class="col-sm-12">
                <table id="page_table_slider" class="table">
                    <thead>
                        <tr>
                            <th>Orden</th>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

