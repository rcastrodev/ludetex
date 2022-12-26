<div class="modal fade" id="modal-create-element">
    <form action="{{ route('product.images.create') }}" method="post" class="modal-dialog" data-info="reset">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <select name="color_id" class="form-control">
                    <option value="0" disabled selected>Selecciona el color</option>
                    @foreach ($colorsMs as $colorsM)
                        <option value="{{ $colorsM->id }}">{{ $colorsM->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
                <small>la imagen card debe ser al menos 679x547</small>
            </div> 
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>