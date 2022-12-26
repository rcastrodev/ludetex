<div class="modal fade" id="modal-update-element">
    <form action="{{ route('product.images.update') }}" method="post" id="form-update-slider" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
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
                    <small>la imagen debe ser al menos 679x547</small>
                </div>    
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>