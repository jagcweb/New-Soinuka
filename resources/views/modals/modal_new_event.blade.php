<div class="modal fade" id="create-event" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Crear nuevo evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('event.save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name_es" class="form-label">Nombre (español)</label>
                        <input type="text" name="name_es" id="name_es" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label for="desc_es" class="form-label">Descripción (español)</label>
                        <textarea name="desc_es" id="desc_es" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="name_eus" class="form-label">Nombre (euskera)</label>
                        <input type="text" name="name_eus" id="name_eus" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label for="desc_eus" class="form-label">Descripción (euskera)</label>
                        <textarea name="desc_eus" id="desc_eus" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" name="date" id="date" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Escoger una imagen...</label>
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                    <input type="submit" value="Subir" class="w-100 mt-2" style="border-radius:5px; font-size:16px; border:none; background:#1d1d1d; height:40px; color:#fff;"/>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->