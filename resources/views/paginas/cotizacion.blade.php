@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item active text-purple" aria-current="page">Pedidos</li>
        </ol>
    </div>
</div>
<form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="" style="color: #666666;">
    @csrf
    <div class="py-5 bg-gray">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="d-block">{{$error}}</span>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
            @endif
            @if (Session::has('mensaje'))
                <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('mensaje') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                    
            @endif
            <div class="mx-auto container">
                <div class="row">
                    <div class="col-sm-12 mb-5">
                        <div class="d-flex flex-sm-column flex-md-row align-items-sm-start align-items-md-center mb-4">
                            <h1 class="text-purple me-3 mb-0 font-size-40">Pedidos</h1>
                            <h3 class="mb-0 text-dark font-size-24">(solo compras Mayoristas)</h3>
                        </div>
                        <h3 class="font-size-24 text-dark">Completá los datos</h3>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <label class="mb-3">Nombre y apellido*</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <label class="mb-3">Email*</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                            <label class="mb-3">Teléfono*</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-5">
                        <div class="form-group">
                            <label class="mb-3">Empresa</label>
                            <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        @if (session('vps'))
                            <div class="col-sm-12 text-end position-relative" style="height: 60px;">
                                <span id="mensaje" class="btn bg-white text-purple py-2 px-4 mb-4 d-none position-absolute" style="border: 1px solid #950372; right:0"><i class="fal fa-check-circle me-2"></i> ¡ Eliminado con exito !</span>
                            </div>
                            <h4 class="text-dark mb-4">Productos agregados</h4>
                            <div class="table-responsive mb-4 col-sm-12">
                                <table id="table" class="table font-size-16">
                                    <thead class="text-white " style="background-color: #B2799C;">
                                        <tr>
                                            <th class="fw-light">Código</th>
                                            <th class="fw-light">Categoría</th>
                                            <th class="fw-light">Color</th>
                                            <th class="fw-light">Presentación</th>
                                            <th class="fw-light">Cantidad</th>
                                            <th class="fw-light" style="width: 200px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('vps') as $k => $item)
                                            <tr>
                                                <td> 
                                                    {{$item['name']}}
                                                    <input type="hidden" name="vp[{{$k}}][name]" value="{{$item['name']}}">
                                                </td>
                                                <td> 
                                                    {{ $item['category'] }} 
                                                    <input type="hidden" name="vp[{{$k}}][category]" value="{{ $item['category'] }}">
                                                </td>
                                                <td>
                                                    {{ $item['color'] }} 
                                                    <input type="hidden" name="vp[{{$k}}][color]" value="{{ $item['color'] }}">
                                                </td>
                                                <td>
                                                    {{ $item['presentation'] }} 
                                                    <input type="hidden" name="vp[{{$k}}][presentation]" value="{{ $item['presentation'] }}">
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="vp[{{$k}}][number]" min="1" value="{{ $item['number'] }}" class="form-control" style="width: 100px;">
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <button class="fal fa-times-circle btn removeItem" style="box-shadow: none !important; font-size: 20px;" data-url="{{ route('vp.destroy', ['id' => $k]) }}"></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container mx-auto">
            <div class="font-size-24 text-purple mb-4">¿Deseas realizar el pedido de forma manual?</div>
            <div class="d-flex flex-wrap flex-sm-column flex-lg-row align-items-center justify-content-between">
                <div class="mb-sm-3 mb-lg-0" style="max-width: 340px;">Descarga el archivo, rellana los datos, guardalo y en adjuntar, sube el archivo. O subí tu archivo directamente!</div>
                <img src="{{ asset('images/RecursoXL1.png') }}" class="img-fluid d-sm-none d-lg-block">
                <a href="{{ route('descargar-formato') }}" class="btn text-purple py-2 px-4 mb-sm-3 mb-lg-0" style="border: 1px solid #950372;">Descargar EXCEL <i class="fal fa-arrow-down"></i></a>
                <div class="form-group mb-4 mb-sm-3 mb-lg-0">
                    <label>Adjunta un archivo</label>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="text-end">
                <span class="text-purple font-size-14">+ ADJUNTAR OTRO ARCHIVO</span>
            </div>
        </div>
    </div>
    <div class="bg-gray">
        <div class="row container mx-auto">
            <div class="d-flex flex-sm-column flex-md-row justify-content-between py-5 col-sm-12">
                <a href="{{ route('categorias') }}" class="btn bg-white text-purple px-4 py-2 mb-sm-3 mb-md-0" style="border: 1px solid #950372;">+ Agregar más productos</a>
                <button class="bg-purple text-white btn px-4 py-2">Realizar pedido</button>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('send-quote-manual') }}" method="post" class="pt-5" enctype="multipart/form-data">
    @csrf
    <div class="container mx-auto">
        <h4 class="text-purple mb-5 text-center">NOTAS DE PEDIDO</h4>
        <div class="row mb-5">
            <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
                <div class="form-group">
                    <label>Cliente:</label>
                    <input type="text" name="cliente" value="{{ old('cliente') }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
                <div class="form-group">
                    <label>Correo:</label>
                    <input type="email" name="correo" value="{{ old('correo') }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-0">
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control">
                </div>
            </div>
        </div>
        <div class="table-responsive" style="max-height: 400px;">
            <table class="table">
                <thead>
                    <tr class="text-center" style="color: white; background-color: #B2799C;">
                        <th class="fw-light">Rollos</th>
                        <th class="fw-light">Blister</th>
                        <th class="fw-light">Articulo</th>
                        <th class="fw-light">Color</th>
                        <th class="fw-light">Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 20; $i++)
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="row[{{$i}}][rollos]" min="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="row[{{$i}}][blister]" min="0" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="row[{{$i}}][articulo]" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="row[{{$i}}][color]" class="form-control">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="row[{{$i}}][detalle]" class="form-control">
                                </div>
                            </td>
                        </tr>   
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-gray py-5 mt-4">
        <div class="container mx-auto text-end">
            <button class="btn bg-purple text-white py-2 px-4">Realizar pedido</button>
        </div>
    </div>
</form>
@endsection
@push('head')
    <style>
        table input{
            min-width: 50px;
        }  
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush