<footer class="py-sm-2 pt-md-5 p-md-2 font-size-15 bg-purple text-sm-center text-md-start">
    <div class="container">
        <div class="row justify-content-between pb-3">
            <div class="col-sm-12 col-md-3 d-sm-none d-lg-block">
                <a href="{{ route('index') }}">
                    <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block img-fluid mb-4">
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 d-sm-none d-md-block">
                <h6 class="font-size-16 text-white fw-bold mb-4">Secciones</h6>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-light font-size-15 mb-3 underline">Nosotros</a>
                        <a href="{{ route('categorias') }}" class="d-block text-decoration-none text-light font-size-15 mb-3 underline">Productos</a>
                        <a href="{{ route('pedidos') }}" class="d-block text-decoration-none text-light font-size-15 mb-3 underline">Pedidos</a>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <a href="{{ route('novedades') }}" class="d-block text-decoration-none text-light font-size-15 mb-3 underline">Novedades</a>
                        <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-light font-size-15 mb-3 underline">Contacto</a>
                    </div>
                </div>                
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-white font-size-16 fw-bold mb-4">Contacto</h6>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="d-flex text-white mb-1">
                                <i class="fas fa-map-marker-alt d-block me-3 mb-3 text-white font-size-20"></i>
                                <div class="text-start">
                                    <span class="d-block text-light font-size-15">{{ $data->address }}</span>
                                </div>
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <i class="fas fa-phone-alt d-block me-3 text-white font-size-20"></i>
                                <div class="d-flex flex-column text-start">
                                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                                    @if (count($phone) == 2)
                                        <a href="tel:{{ $phone[0]}}" class="text-light underline mb-1 font-size-15">{{ $phone[1] }}</a>  
                                    @else 
                                        <a href="tel:{{ $data->phone1}}" class="text-light underline mb-1 font-size-15">{{ $data->phone1 }}</a>  
                                    @endif
                                    @if (count($phone2) == 2)
                                        <a href="tel:{{ $phone2[0]}}" class="text-light underline mb-1 font-size-15">{{ $phone2[1] }}</a>  
                                    @else 
                                        <a href="tel:{{ $data->phone2}}" class="text-light underline mb-1 font-size-15">{{ $data->phone2 }}</a>  
                                    @endif
                                </div>
                            </div>  
                            <div class="d-flex mb-2">
                                <i class="fab fa-whatsapp d-block me-3 mb-3 text-white font-size-20"></i>
                                <div class="d-flex flex-column text-start">
                                    @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                                    @if (count($phone3) == 2)
                                        <a href="https://wa.me/{{ $phone3[0]}}" class="text-light underline mb-1 font-size-15">{{ $phone3[1] }}</a>  
                                    @else 
                                        <a href="https://wa.me/{{ $data->phone3}}" class="text-light underline mb-1 font-size-15">{{ $data->phone3 }}</a>  
                                    @endif
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="d-flex text-white mb-3">
                                <i class="fas fa-envelope d-block me-3 mb-3 text-white font-size-20"></i>
                                <div class="text-start">
                                    <a href="mailto:{{ $data->email }}" class="text-light underline font-size-15">{{ $data->email }}</a>
                                </div>
                            </div>
                            <div class="d-flex text-white">
                                <i class="fas fa-envelope d-block me-3 mb-3 text-white font-size-20"></i>
                                <div class="text-start">
                                    <a href="mailto:{{ $data->email2 }}" class="text-light underline font-size-15">{{ $data->email2 }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="" style="background-color: #B2799C;">
    <div class="container py-2 d-flex flex-wrap justify-content-between">
        <div class="font-size-15 text-white">© Copyright 2022 Ludetex. Fábrica de puntillas. Todos los derechos reservados</div>
        <a href="https://osole.com.ar/" class="text-white text-decoration-none font-size-15">By Osole</a>
    </div>
</div>
@isset($data->phone3)
    @if (count($phone3) == 2)
        <a href="https://wa.me/{{$phone3[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>      
    @else 
        <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>     
    @endif   
@endisset