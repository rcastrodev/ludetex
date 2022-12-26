@extends('paginas.partials.app')
@section('content')
    <div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categorias') }}" class="text-decoration-none text-purple">Productos</a>
                </li>
                <li class="breadcrumb-item active text-purple" aria-current="page">{{ $subCategoria->name }}</li>
            </ol>
        </div>
    </div>
    @isset($categories)
        @if (count($categories))
            <section class="py-sm-2 py-md-5 bg-gray">
                <div class="container row mx-auto px-0">
                    <div class="col-sm-12 order-sm-2 order-md-1">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h1 class="text-purple font-size-40 mb-0">Productos</h1>
                            <a href="{{ route('pedidos') }}" class="btn bg-purple text-white py-2 px-4 d-sm-none d-md-inline">Ir a mi pedido</a>
                        </div>
                        <div class=""><h4 class="font-size-24 mb-4">Categorías</h4></div>
                    </div>
                    <aside class="col-sm-12 col-md-3 order-sm-3 order-md-2">
                        <ul class="p-0" style="list-style: none;">
                            @foreach ($categories as $c)
                                <li class="@if (!count($c->subCategories) > 1) py-2 @endif"> 
                                    <a @if (count($c->subCategories) > 1) href="#" 
                                        @else href="{{ route('sub-categoria', ['id'=> $c->subCategories()->first()->id]) }}" @endif  
                                        class="
                                        @if(count($c->subCategories) > 1) toggle @else 
                                            @if($subCategoria->id == $c->subCategories()->first()->id) fw-bold  @endif 
                                        @endif 
                                        d-block p-2 py-3 text-decoration-none  text-decoration-none text-blue-dark font-size-14 d-inline-block position-relative">{{$c->name}} 
                                        @if(count($c->subCategories) > 1) <i class="fas fa-arrow-down text-purple" style="position: absolute;
                                        right: 15px; top: 20px;"></i> @endif</a>
                                    <ul class="p-0" style="list-style: none; @if($c->id != $subCategoria->id) display: none; @endif">
                                        @foreach ($c->subCategories as $subCategory)
                                            @if ($subCategory->name != $c->name)
                                                <li class="py-2">
                                                    <a href="{{ route('sub-categoria', ['id' => $subCategory->id]) }}" class="text-blue-dark text-decoration-none ps-4 font-size-14 d-inline-block 
                                                    @if($subCategoria->id == $subCategory->id) fw-bold @endif">{{$subCategory->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>                        
                            @endforeach
                        </ul>
                    </aside>
                    <section class="col-sm-12 col-md-9 font-size-14 order-sm-3 order-md-2">
                        <div class="row">
                            @isset($products)
                                @foreach ($products as $p)
                                    <div class="col-sm-12 col-md-4 mb-5">
                                        @include('paginas.partials.producto', ['p' => $p])
                                    </div>
                                @endforeach                    
                            @endisset
                        </div>
                    </section>
                </div>
            </section>
        @endif
    @endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush


