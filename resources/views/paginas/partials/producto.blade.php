<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas position-absolute text-decoration-none text-white" style="font-size: 50px; background-color: #b98da84d;">+</a>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body ps-0 pt-1">
        <div class="card-text mb-0">
            <small class="d-inline-block mb-2 font-size-15 fw-light text-uppercase"> {{ $p->fingerprint() }}</small>
            <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="text-uppercase font-size-16 text-decoration-none d-block text-dark">{{ Str::limit($p->name, 30) }}</a>
            @if (isset($p->colores))
                @if (count($p->colores))
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <h6 class="mb-0" style="font-weight: 400;">Colores</h6>
                        <ul class="d-flex flex-wrap p-0 mb-0 justify-content-end" style="list-style: none;">
                            @foreach ($p->colores as $k => $color)
                                @if ($k == 5)
                                    <li class="me-1 mb-1">
                                        <div class="d-flex justify-content-center align-items-center" style="height: 15px; width:15px; border-radius:100%; border:1px solid black; ">+</div>
                                    </li>  
                                    @break
                                @endif
                                <li class="me-1 mb-1">
                                    <div style="height: 15px; width:15px; border-radius:100%; background-color: {{ $color->hexa }}; border:1px solid black;"></div>
                                </li>
                            @endforeach
                        </ul>
                    </div> 
                @endif
            @endif
        </div>
    </div>
</div>