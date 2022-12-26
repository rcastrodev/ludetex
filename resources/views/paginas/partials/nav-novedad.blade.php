<form action="{{ route('novedades') }}" class="mb-4">
    <div class="input-group">
        <input type="text" class="form-control" name="titulo" placeholder="Buscar ..." style="border-right: 0">
        <button type="submit" class="input-group-text bg-transparent" style="border-left: 0"><i class="fas fa-search"></i></button>
    </div>   
</form>
<div class="text-uppercase text-blue fw-blue font-size-14 fw-bold mb-4">categorías</div>
<ul style="list-style: none" class="p-0">
    <li class="py-1">
        <img src="{{ asset('images/baseline-last_page-24blackpx.svg') }}">
        <a href="{{ route('novedades', ['categoria'=> 'actualidad']) }}" class="text-decoration-none fw-light font-size-16">Actualidad</a>
    </li>
    <li class="py-1">
        <img src="{{ asset('images/baseline-last_page-24blackpx.svg') }}">
        <a href="{{ route('novedades', ['categoria'=> 'empresa']) }}" class="text-decoration-none fw-light font-size-16">Empresa</a>
    </li>
    <li class="py-1">
        <img src="{{ asset('images/baseline-last_page-24blackpx.svg') }}">
        <a href="{{ route('novedades', ['categoria'=> 'productos']) }}" class="text-decoration-none fw-light font-size-16">Productos</a>
    </li>
</ul>