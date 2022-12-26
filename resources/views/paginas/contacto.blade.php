@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-white py-2 font-size-14">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-purple"><i class="fas fa-home-lg"></i></a>
            </li>
            <li class="breadcrumb-item active text-purple" aria-current="page">Contacto</li>
        </ol>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.827033795432!2d-58.491083684974846!3d-34.6590708804452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc91263cea037%3A0xb7ebf711dce42502!2sPola%202249%2C%20C1440DBE%20CABA%2C%20Argentina!5e0!3m2!1ses!2sve!4v1653492002315!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
<div class="py-5 bg-gray" style="margin-top: -10px;">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <h2 class="mb-4 pb-2 text-purple font-size-40">Contacto</h2>
                    <p class="font-size-16 text-dark mb-5">Para mayor información, no dude en contactarse 
                        mediante el siguiente formulario, o a través de nuestras 
                        vías de comunicación.</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-purple d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope text-purple d-block me-3"></i><span class="d-block"></span>  
                        <a href="mailto:{{ $data->email }}" class="underline text-dark">{{ $data->email }}</a>                      
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt text-purple d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        <div class="d-flex flex-column">
                            @if (count($phone) == 2)
                                <a href="tel:{{ $phone[0] }}" class="underline text-dark">{{ $phone[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone1 }}" class="underline text-dark">{{ $data->phone1 }}</a>
                            @endif   
                            @if (count($phone2) == 2)
                                <a href="tel:{{ $phone2[0] }}" class="underline text-dark">{{ $phone2[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone2 }}" class="underline text-dark">{{ $data->phone2 }}</a>
                            @endif       
                        </div>
 
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp text-purple d-block me-3"></i>
                        @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                        @if (count($phone3) == 2)
                            <a href="https://wa.me/{{ $phone3[0] }}" class="underline text-dark">{{ $phone3[1] }}</a>
                        @else 
                            <a href="https://wa.me/{{ $data->phone3 }}" class="underline text-dark">{{ $data->phone3 }}</a>
                        @endif      
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="mb-3">Nombre y apellido*</label>
                                <input type="text" name="nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="mb-3">Email*</label>
                                <input type="email" name="email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="mb-3">Teléfono*</label>
                                <input type="text" name="telefono" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="mb-3">Empresa</label>
                                <input type="text" name="empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="mb-3">Mensaje</label>
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5" placeholder="Escriba un mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mt-5">
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3"><span>*Campos Obligatorios</span></div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-sm-center text-md-end">
                            <button type="submit" class="btn bg-purple font-size-16 py-2 mb-sm-3 mb-md-0 text-white px-5" style="box-shadow: 0px 3px 6px #00000029; width: 250px;">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
