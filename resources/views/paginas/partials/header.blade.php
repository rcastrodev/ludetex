<div id="pre-header" class="d-sm-none d-md-block font-size-16 position-relative bg-gray pt-3">
    <div class="container">
        <div class="d-flex justify-content-end align-items-center">
            <div class="d-inline-block">
                <i class="fab fa-whatsapp text-purple me-1 text-purple"></i> 
                @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                @if (count($phone3) == 2)
                    <a href="https://wa.me/{{$phone3[0]}}" class="text-purple underline underline">{{ $phone3[1] }}</a>
                @else 
                    <a href="https://wa.me/{{$data->phone3}}" class="text-purple underline underline">{{ $data->phone3 }}</a>
                @endif
            </div>
            <div class="mx-3 text-purple">|</div>
            <div class="d-inline-block email me-3">
                <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-purple underline underline" style="z-index: 100;">
                    <i class="fas fa-envelope text-purple me-1"></i> {{ $data->email }}
                </a>
            </div>
            <div class="mx-3 text-purple">|</div>
            <div class="d-inline-block email me-3">
                <a href="mailto:{{ $data->email2 }}" class="mb-xs-2 mb-md-0 text-purple underline underline" style="z-index: 100;">
                    <i class="fas fa-envelope text-purple me-1"></i> {{ $data->email2 }}
                </a>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-gray">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('categorias') || Request::is('categoria/*') ||  Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('categorias') || Request::is('categoria/*') || Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) active @endif" href="{{ route('categorias') }}">Productos</a>
                </li>
                <li class="nav-item @if(Request::is('pedidos')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('pedidos')) active @endif" href="{{ route('pedidos') }}">Pedidos</a>
                </li>
                <li class="nav-item @if(Request::is('novedades') || Request::is('novedades/*')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('novedades') || Request::is('novedades/*')) active @endif" href="{{ route('novedades') }}">Novedades</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
