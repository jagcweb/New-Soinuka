<div class="modal fade" id="delete-image-{{$image->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Borrar imagen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <br>
                <div class="w-100 mb-3" style="display:flex; justify-content:center;">
                    <img src="{{url('admin/get-image/'.$image->name)}}" height="120px">
                </div>

                <p class="w-100 text-center text-danger">La imagen se borrará definitivamente</p>

                <a href="{{route('image.delete', ['id' => $image->id])}}" class="d-block w-100 mt-2 text-center" style=" text-decoration:none; line-height:30px; padding:5px; border-radius:5px; font-size:16px; border:none; background:#1d1d1d; height:40px; color:#fff;">Borrar definitivamente</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->