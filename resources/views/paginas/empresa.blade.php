@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item active text-purple" aria-current="page">Empresa</li>
        </ol>
    </div>
</div>
<div class="py-5 bg-gray">
	<div class="container mx-auto">
		@isset($section1)
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h1 class="text-purple mb-3 font-size-40">{{ $section1->content_1 }}</h1>
					<h3 class="mb-5 font-size-24">{{ $section1->content_2 }}</h3>
					<div class="font-size-16">{!! $section1->content_3 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					@if (Storage::disk('custom')->exists($section1->image))
						<img src="{{ asset($section1->image) }}" class="img-fluid w-100">
					@endif
				</div>
			</div>		
		@endisset
		<div class="mt-4"></div>
		@isset($section2)
			<h3 class="text-purple mb-4 font-size-32">{{ $section2->content_1 }}</h3>
		@endisset
		<div class="row mb-5">
			<div class="col-sm-12 col-md-6">
				@if (Storage::disk('custom')->exists($section3->image))
					<img src="{{ asset($section3->image) }}" class="img-fluid w-100" style="max-height: 600px">
				@endif
			</div>
			<div class="col-sm-12 col-md-6 d-flex flex-column justify-content-between">
				@isset($section4s)
					@if (count($section4s))
						@foreach ($section4s as $s4)
							<div class="bg-white text-purple py-5 px-sm-2 px-md-5 mt-sm-3 mt-md-0" style="border: 1px solid #950372; border-radius: 4px;">
								<div class="d-flex justify-content-between align-items-center mb-4">
									<h2 class="font-size-20">{{ $s4->content_1 }}</h2>
									@if (Storage::disk('custom')->exists($s4->image))
										<img src="{{ asset($s4->image) }}" alt="{{ $s4->content_1 }}" class="img-fluid" style="height: 90px;">
									@endif
								</div>
								<div class="font-size-16">{!! $s4->content_2 !!}</div>
							</div>
						@endforeach
					@endif
				@endisset
			</div>
		</div>
	</div>
</div>
@endsection
