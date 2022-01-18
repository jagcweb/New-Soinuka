<div class="modal fade" id="edit-image-{{$image->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Editar imagen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('image.update')}}" enctype="multipart/form-data">
                    @csrf
                    <p class="w-100 text-center">Imagen actual:</p>
                    <br>
                    <div class="w-100 mb-3" style="display:flex; justify-content:center;    ">
                        <img src="{{url('admin/get-image/'.$image->name)}}" height="120px">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Escoger una imagen...</label>
                        <input type="file" name="image" id="image" class="form-control"/>
                        <input type="hidden" name="id" value="{{$image->id}}"/>
                        <input type="submit" value="Subir" class="w-100 mt-2" style="border-radius:5px; font-size:16px; border:none; background:#1d1d1d; height:40px; color:#fff;"/>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->