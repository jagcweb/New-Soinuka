<div class="modal fade" id="edit-event-{{$event->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Editar evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('event.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name_es" class="form-label">Nombre (español)</label>
                        <input type="text" name="name_es" id="name_es" class="form-control" value="{{$event->name_es}}"/>
                    </div>

                    <div class="mb-3">
                        <label for="desc_es" class="form-label">Descripción (español)</label>
                        <textarea name="desc_es" id="desc_es" class="form-control">{{$event->desc_es}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="name_eus" class="form-label">Nombre (euskera)</label>
                        <input type="text" name="name_eus" id="name_eus" class="form-control" value="{{$event->name_eus}}"/>
                    </div>

                    <div class="mb-3">
                        <label for="desc_eus" class="form-label">Descripción (euskera)</label>
                        <textarea name="desc_eus" id="desc_eus" class="form-control">{{$event->desc_eus}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{\Carbon\Carbon::parse($event->date)->format('Y-m-d')}}"/>
                    </div>
                    <p class="w-100 text-center">Imagen actual:</p>
                    <br>
                    <div class="w-100 mb-3" style="display:flex; justify-content:center;">
                        <img src="{{url('admin/get-event-image/'.$event->image)}}" height="120px">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Escoger una imagen...</label>
                        <input type="file" name="image" id="image" class="form-control"/>
                        <input type="hidden" name="id" value="{{$event->id}}"/>
                        <input type="submit" value="Subir" class="w-100 mt-2" style="border-radius:5px; font-size:16px; border:none; background:#1d1d1d; height:40px; color:#fff;"/>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->