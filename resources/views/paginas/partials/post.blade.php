<div class="card" style="border-radius:0; min-height: 471px;">
    <img src="{{ asset($p->image) }}" class="card-img-top">
    <div class="card-body position-relative">
        <small class="text-purple fw-bold font-size-14" style="display: block; margin-bottom: 15px;">{{ $p->content_3 }}</small>
        <h5 class="card-title font-size-20">{{ $p->content_1 }}</h5>
        <p class="card-text font-size-20">{!! Str::limit($p->content_2, 80) !!}</p>
        <small class="font-size-14 position-absolute"  style="bottom: 10px; left: 20px;">{{ date('d/m/Y', strtotime($p->created_at)) }}</small>
        <a href="{{ route('obtenerNovedad', ['id'=> $p->id]) }}" class="btn text-blue font-size-14 position-absolute fw-bold" style="bottom: -5px; right: 20px; font-size: 25px; box-shadow: none !important;"><i class="fa fa-arrow-right text-purple"></i></a>
    </div>
</div>