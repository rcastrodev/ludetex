@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active text-dark font-size-13 fst-italic" aria-current="page">Sectores / Agro</li>
            </ol>
        </nav>  
    </div>
</div>
@isset($sliders)
	@if(count($sliders))
		<div id="sliderCalidad" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
						<div class="carousel-caption w-75">
							<h2 class="font-size-50 fw-bold">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif	
@endisset
@isset($section2)
    <section class="py-sm-2 py-md-5">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2 class="text-blue font-size-22">{{ $section2->content_1 }}</h2>
                    <div class="font-size-14" style="font-weight: 500;">{!! $section2->content_2 !!}</div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-between justify-content-sm-center align-items-center mb-5 flex-sm-wrap flex-md-nowrap ">
                    @foreach ($section3s as $s3)
                        <img src="{{ asset($s3->image) }}" class="img-fluid" style="min-width: 189px; max-width: 189px; min-height: 189px; max-height: 189px;">
                    @endforeach
                </div>
                @foreach ($section4s as $s4)
                    @if (Storage::disk('custom')->exists($s4->image))
                    <div class="col-sm-12 col-md-6">
                        <div class="bg-light py-2 px-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <strong class="text-blue">{{ $s4->content_1 }}</strong>
                                <span class="text-uppercase font-size-14" style="color: #7E90A1;">DESCARGAR</span>
                            </div>
                            <a href="{{ route('content.politica', ['id'=>$s4->id]) }}"><i class="fas fa-download text-blue"></i></a>
                        </div>
                    </div>
                    @endif
                @endforeach                
            </div>
        </div>
    </section>
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
