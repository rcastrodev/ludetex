@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-error')
    @includeIf('administrator.partials.mensaje-exitoso')
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos de la empresa</h3>
    </div>
    <form action="{{ route('data.content.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <input type="hidden" name="id" value="{{$company_id}}">
            <div class="form-group">
                <input type="text" name="address" value="{{$data->address}}" class="form-control" placeholder="Dirección de la empresa">
            </div>
            <div class="form-group">
                <input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="Email 1">
            </div>
            <div class="form-group">
                <input type="text" name="email2" value="{{$data->email2}}" class="form-control" placeholder="Email 2">
            </div>
            <div class="form-group">
                <input type="text" name="phone1" value="{{$data->phone1}}" class="form-control" placeholder="Teléfono 1">
            </div>
            <div class="form-group">
                <input type="text" name="phone2" value="{{$data->phone2}}" class="form-control" placeholder="Teléfono 2">
            </div>
            <div class="form-group">
                <input type="text" name="phone3" value="{{$data->phone3}}" class="form-control" placeholder="Whatsapp">
            </div>
            <div class="form-group">
                <small>Importante para el posicionamiento del sitio wen</small>
                <textarea name="description" class="ckeditor" cols="30" rows="10">{{$data->description}}</textarea>
            </div>
            @if (Storage::disk('custom')->exists($data->logo_header))
                <div class="mb-3">
                    <img src="{{ asset($data->logo_header) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                    max-height: 70px; min-height: 70px; object-fit: contain;">
                </div>                    
            @endif
            <div class="form-group">
                <label for="logoheader">Logo header</label>
                <input type="file" name="logo_header" class="form-control-file" id="logoheader">
            </div>
            @if (Storage::disk('custom')->exists($data->logo_footer))
                <div class="mb-3">
                    <img src="{{ asset($data->logo_footer) }}" class="img-fluid" style="max-width: 100px; min-width: 100px;
                    max-height: 70px; min-height: 70px; object-fit: contain;">
                </div>
            @endif
            <div class="form-group">
                <label for="logofooter">Logo footer</label>
                <input type="file" name="logo_footer" class="form-control-file" id="logofooter">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary ">Actualizar</button>
        </div>
    </form>
</div>      

@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

