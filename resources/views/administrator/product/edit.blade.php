@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary" data-asyn="no">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="AA">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Subcategoría</label>
            <select name="sub_category_id" class="form-control select2">
                @foreach ($subCategories as $subCategory)
                    <option value="{{$subCategory->id}}" 
                        @if($subCategory->id == $product->sub_category_id) selected @endif
                    >{{$subCategory->name}}</option>
                @endforeach
            </select>
        </div> 
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">ver</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12 col-md-4">
            <label>Catálogo</label>
            <input type="file" name="extra" class="form-control-file">
        </div> 
        <div class="form-group col-sm-12">
            <label for="">Características</label>
            <textarea name="characteristic" class="ckeditor" id="" cols="30" rows="10">{{ $product->characteristic }}</textarea>
        </div>    
        <div class="form-group col-sm-12">
            <label for="">Archo</label>
            <input type="text" name="width" value="{{ $product->width }}" class="form-control" placeholder="Separar por |">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Presentación y medidas</label>
            <input type="text" name="presentation_and_measurements" value="{{ $product->presentation_and_measurements }}" class="form-control" placeholder="Separar por |">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Colores</label>
            <select name="colores[]" class="form-control select2"  multiple="multiple">
                @foreach ($colores as $color)
                    <option value="{{$color->id}}"
                        @if(in_array($color->id, $product->colores->pluck('id')->toArray(), true)) selected @endif
                    >{{$color->name}}</option>
                @endforeach
            </select>
        </div>        
        <h3 class="col-sm-12 mt-4 mb-3">Imagenes del Banner</h3>
        @foreach ($product->banner as $banner)
            <div class="form-group col-sm-12 col-md-4">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-banner.content.destroy', ['id'=> $banner->id]) }}"></button>
                    <img src="{{ asset($banner->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen <small>1366x468px</small></label>
                <input type="file" name="banner[]" class="form-control-file">
            </div>                    
        @endforeach
        @for ($i = 1; $i <= 3; $i++)
            <div class="form-group col-sm-12 col-md-4">
                <label for="image">imagen <small>1366x468px</small></label>
                <input type="file" name="banner[]" class="form-control-file" id="">
            </div>           
        @endfor
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
<div class="row py-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h1 class="mr-3">Imágenes del producto</h1>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">subir</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Color</th>
                    <th>Hexa</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.product.modals.create')
@includeIf('administrator.product.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="url2" content="{{route('product.images.get-list', ['id' => $product->id])}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/product/product.js') }}"></script>
    <script>
        let table = $('#page_table_slider').DataTable({
            serverSide: true,
            ajax: `${$('meta[name="url2"]').attr('content')}`,
            bSort: true,
            order: [],
            destroy: true,
            columns: [
                { data: "order" },
                { data: "color" },
                { data: "hexa" },
                { data: "image"},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            }, 
        });

        async function findContent2(id)
        {   
            // get content 
            let url = document.querySelector('meta[name="url"]').getAttribute('content')
            if(url){
                if(id){
                    try {
                        let result = await axios.get(`${url}/images/find/${id}`)
                        let content = result.data.content 
                        dataImageProduct(content)
                    } catch (error) {
                        console.log(new Error(error));
                    }
                }
            }
        }

        function dataImageProduct(content)
        {
            let form = document.getElementById('form-update-slider')
            form.reset()
            
            if (content.color_id) 
                form.querySelector(`option[value="${content.color_id}"]`).setAttribute('selected', 'true')

            if (content.order) 
                form.querySelector('input[name="order"]').setAttribute('value', content.order)
            
            form.querySelector('input[name="id"]').setAttribute('value', content.id)
            
        }

        function modalDestroy2(id)
        {
            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroy2(id)
                }
            })
        }

        function elementDestroy2(id)
        {
            axios.delete(`${$('meta[name="url"]').attr('content')}/images/${id}`).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )
                table.ajax.reload()
                
            }).catch(error => console.error(error))

        }

    </script>
@stop

