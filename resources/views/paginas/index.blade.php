@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
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
@endisset
@isset($products)
	@if (count($products))
		<section class="pt-4 pb-2 bg-purple-2">
			<div class="container row mx-auto">
				<div class="container py-md-5 py-sm-2 font-size-36 text-center">Nuestros Productos</div>
				@foreach ($products as $p)
					<div class="col-sm-12 col-md-3 mb-3">
						@includeIf('paginas.partials.producto', ['p' => $p])
					</div>
				@endforeach
			</div>
		</section>
	@endif
@endisset
<div class="py-5 bg-gray-2">
	<div class="container row mx-auto">
		@if (isset($section3s))
			<div class="bg-white py-3 px-4 mb-5" style="border: 1px solid black; border-radius: 3px;">
				@if($section2)
					<h4 class="mb-5">{{ $section2->content_1 }}</h4>
				@endif
				@if (count($section3s))
					<div class="row justify-content-between">
						@foreach ($section3s as $s3)
							<div class="col-sm-12 col-md-5 mb-2">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<h2 class="font-size-32">{{ $s3->content_1 }}</h2>
									@if (Storage::disk('custom')->exists($s3->image))
										<img src="{{ asset($s3->image) }}" alt="{{ $s3->content_1 }}" class="img-fluid" style="height: 90px;">
									@endif
								</div>
								<div class="">{!! $s3->content_2 !!}</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
			@isset($posts)
				@if (count($posts))
					<div class="">
						<h2 class="text-purple mb-4">Novedades</h2>
						<div class="row">
							@foreach ($posts as $post)
								<div class="col-sm-12 col-md-4 mb-3">
									@includeIf('paginas.partials.post', ['p' => $post])
								</div>
							@endforeach
						</div>
					</div>
				@endif
			@endisset
		@endif
	</div>
</div>
@endsection
@push('head')
	<style>
		.carousel-indicators [data-bs-target]{
			background-color: #950372 !important;
			height: 15px !important;
    		width: 15px !important;
		}
	</style>
@endpush