@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple">Noveades</a>
            </li>
            <li class="breadcrumb-item active text-purple" aria-current="page">{{ $post->content_1 }}</li>
        </ol>
    </div>
</div>
@isset($post)
	<section class="py-md-5 py-sm-3 bg-gray">
		<div class="container row mx-auto">
            <div class="col-sm-12 col-md-7">
                <h5 class="card-title font-size-40 text-purple mb-4"><i class="fal fa-arrow-left me-3"></i> {{ $post->content_1 }}</h5>
                <div class="card" style="border: none; border-radius:0; min-height: 500px; background-color:transparent !important;">
                    <img src="{{ asset($post->image) }}" class="card-img-top mb-5">
                    <div class="card-body position-relative bg-gray ps-0">
                        <div class="card-text font-size-16" style="font-weight: 400">{!! $post->content_2 !!}</div>
                    </div>
                </div>
            </div>
		</div>
	</section>
@endisset

@endsection