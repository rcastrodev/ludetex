@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item active text-purple" aria-current="page">Novedades</li>
        </ol>
    </div>
</div>
@isset($posts)
	<section class="py-md-5 py-sm-3 bg-gray">
		<div class="container row mx-auto">
            <div class="col-sm-12">
                <h2 class="font-size-40 text-purple mb-4">Novedades</h2>
                <div class="row">
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <div class="col-sm-12 col-md-4 mb-3">
                                @includeIf('paginas.partials.post', ['p' => $post])
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-center">no hay post cargados</h3>
                    @endif
                </div>
            </div>
		</div>
	</section>
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
