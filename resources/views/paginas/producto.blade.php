@extends('paginas.partials.app')
@section('content')
    <div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('sub-categoria', ['id' => $product->subCategory->id]) }}" class="text-decoration-none text-purple">{{$product->subCategory->name}}</a>
                </li>
                <li class="breadcrumb-item active text-purple" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div>
    </div>
    <section class="py-sm-2 py-md-5 bg-gray">
        <div class="container row mx-auto px-0 producto">
            <div class="col-sm-12 col-md-7 font-size-14 row mx-auto">
                <div class="d-sm-none d-lg-block col-sm-2">
                    <ul class="p-0 img-ref" style="list-style: none;">
                        @foreach ($product->images as $pi)
                            <li class="mb-2">
                                <img src="{{ asset($pi->image) }}" class="image{{$pi->color_id}}" width="85" height="65" style="object-fit: cover;">
                            </li>                 
                        @endforeach
                    </ul>
                </div>
                <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2 mb-3 col-sm-12 col-md-10" data-bs-ride="carousel" style="">
                    @if ($product->images)
                        @if (count($product->images))
                            <img src="{{ asset($product->images()->first()->image) }}" id="imageCurrent" class="d-block w-100 img-fluid" style="object-fit: contain; min-width: 100%; max-width: 100%; height: 400px;">
                        @else
                            <img src="images/default.jpg" class="d-block w-100 img-fluid" style="object-fit: contain; min-width: 100%; max-width: 100%; height: 400px;">
                        @endif
                    @else
                        <img src="images/default.jpg" class="d-block w-100 img-fluid" style="object-fit: contain; min-width: 100%; max-width: 100%; height: 400px;">
                    @endif
                    <div id="textcolor" class="text-center fw-bold font-size-16"></div>
                </div> 
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="">
                    <h1 class="mb-3 font-size-24 text-purple mb-sm-3 mb-md-5">{{ $product->subCategory->name }} - {{ $product->name }}</h1>
                    @if ($product->characteristic)
                        <div class="font-size-16 mb-md-3 mb-sm-2 mb-md-5">
                            <h6 class="text-purple">Característica:</h6>
                            <div class="ul-style">{!! $product->characteristic  !!}</div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="mb-5">
                                <h6 class="text-purple">Ancho:</h6>
                                <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                    @foreach (Str::of($product->width)->explode('|') as $width)
                                        <li class="me-2 mb-2">{{ $width }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="font-size-16">
                                <h6 class="text-purple">Presentación y Medidas:</h6>
                                <ul class="p-0" style="list-style: none">
                                    @if ($product->presentation_and_measurements)
                                        @foreach (Str::of($product->presentation_and_measurements)->explode('|') as $item)
                                            <li>{{ $item }}</li> 
                                        @endforeach    
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex flex-column justify-content-between">
                            @if (count($product->colores))
                                <div class="">
                                    <h6 class="text-purple">Colores:</h6>
                                    <ul class="d-flex flex-wrap p-0 mb-5" style="list-style: none;">
                                        @foreach ($product->colores as $color)
                                            <li class="me-2 mb-2">
                                                @if ($product->images)
                                                    @if (count($product->images))
                                                        @if (in_array($color->id, $product->images()->pluck('color_id')->toArray()))
                                                            <div class="image-color" title="{{ $color->name }}" data-textcolor="{{ $color->name }}" data-colorid="{{ $color->id }}" style="height: 15px; width:15px; border-radius:100%; background-color: {{ $color->hexa }}; border:1px solid black; cursor:pointer;"></div>
                                                        @else
                                                            <div style="height: 15px; width:15px; border-radius:100%; background-color: {{ $color->hexa }}; border:1px solid black;"></div>
                                                        @endif
                                                    @endif
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="px-4 btn font-size-16 text-center text-purple fw-bold bg-white" style="border:1px solid #950372;">Descargar Catálogo <i class="fas fa-arrow-down text-purple"></i></a>       
                            @endif
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>
	@if (count($product->banner))
		<div id="bannerProducto" class="carousel slide" data-bs-ride="carousel">
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerProducto" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerProducto" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
			<div class="carousel-inner">
				@foreach ($product->banner as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="font-size-40 text-blue fw-bold mb-5">{{ $v->content_1 }}</h2>
							<div class="font-size-16 text-white" style="font-weight: 500;">{!! $v->content_2 !!}</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
    <div class="bg-gray py-5">
        <div class="container mx-auto row">
            <div class="col-sm-12 text-end position-relative" style="height: 60px;">
                <span id="mensaje" class="btn bg-white text-purple py-2 px-4 mb-4 d-none position-absolute" style="border: 1px solid #950372; right:0"><i class="fal fa-check-circle me-2"></i> ¡Se agrego correctamente tu producto !</span>
            </div>
            <div class="table-responsive mb-4 col-sm-12">
                <table id="tableVP" class="table font-size-16">
                    <thead class="text-white " style="background-color: #B2799C;">
                        <tr>
                            <th class="fw-light">Código</th>
                            <th class="fw-light">Categoría</th>
                            <th class="fw-light" style="min-width: 200px">Color</th>
                            <th class="fw-light" style="min-width: 200px">Presentación y Medidas</th>
                            <th class="fw-light">Cantidad</th>
                            <th class="fw-light" style="width: 200px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 
                                {{ $product->name }} 
                                <input type="hidden" name="productid" id="inputproductid" value="{{ $product->id }} ">
                                <input type="hidden" name="name" id="inputname" value="{{ $product->name }} ">
                            </td>
                            <td> 
                                {{ $product->fingerprint() }} 
                                <input type="hidden" name="category" id="inputcategory" value="{{ $product->fingerprint() }} ">
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="color" id="inputcolor" class="form-control">
                                        <option value="Seleccionar" selected disabled>Seleccionar</option>
                                        @foreach ($product->colores as $color)
                                            <option value="{{ $color->name }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="presentation" id="inputpresentacion" class="form-control">
                                        @if ($product->presentation_and_measurements)
                                            <option value="Seleccionar" selected disabled>Seleccionar</option>
                                            @foreach (Str::of($product->presentation_and_measurements)->explode('|') as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach    
                                        @else
                                            <option value="Sin presentación" selected>Sin presentación</option>
                                        @endif
                                    </select> 
                                </div> 
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="number" id="inputnumber" min="1" value="1" class="form-control" style="width: 70px;">
                                </div>
                            </td>
                            <td class="text-end">
                                <button class="bg-white text-purple btn py-2 px-4 addVP" data-url="{{ route('vp.store') }}" style="border: 1px solid #950372; min-width: 180px;">Agregar al pedido</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between flex-sm-column flex-md-row mb-5 col-sm-12">
                <a href="{{ route('categorias') }}" class="btn bg-white text-purple px-4 py-2 mb-sm-2 mb-md-0" style="border: 1px solid #950372;">+ Agregar más productos</a>
                <a href="{{ route('pedidos') }}" class="bg-purple text-white btn px-4 py-2">Ver pedido</a>
            </div>
            @if (session('vps'))
                <div class="col-sm-12 text-end position-relative" style="height: 60px;">
                    <span id="mensaje" class="btn bg-white text-purple py-2 px-4 mb-4 d-none position-absolute" style="border: 1px solid #950372; right:0"><i class="fal fa-check-circle me-2"></i> ¡ Eliminado con exito !</span>
                </div>
                <h4 class="text-dark mb-4 col-sm-12">Productos agregados</h4>
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
                                            <input type="number" name="vp[{{$k}}][number]" min="1" value="{{ $item['number'] }}" class="form-control" readonly style="width: 100px;">
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
            @if (count($relatedProducts))
                <div class="row mb-5 col-sm-12">
                    <div class="col-sm-12 mb-3">
                        <h5 class="font-size-32 text-dark pb-3">Productos Relacionados</h5>
                    </div>
                    @foreach ($relatedProducts as $k => $p)
                        <div class="col-sm-12 col-md-3">
                            @includeIf('paginas.partials.producto', ['product' => $p])
                        </div>       
                        @php if($k == 3) break; @endphp
                    @endforeach
                </div>                  
            @endif 
        </div>
    </div>

  
@endsection
@push('head')
    <style>
        #carruselProducto, 
        #carruselProducto .carousel-inner, 
        #carruselProducto .carousel-inner .carousel-item, 
        #carruselProducto .carousel-inner .carousel-item img{
            min-height: 400px;
            max-height: 400px;
        }
        .carousel-indicators [data-bs-target]{
            background-color: gray !important; 
        }
        .img-ref{
            max-height: 450px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        #carruselProducto{
            border: none !important;
        }

    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/pages/product.js?v=1') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
    <script>
        $('.image-color').click(function(e){
            const colorId   = e.target.dataset.colorid
            const textcolor = e.target.dataset.textcolor
            const image     = $(`.image${colorId}`).attr('src')
            $('#imageCurrent').attr('src', image)
            $('#textcolor').text(textcolor)
        })
    </script>
@endpush


