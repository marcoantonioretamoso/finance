<div class="modal fade" id="modalEditIngreso" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar prestamo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="incomeFormEdit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-6">
                        <label for="" class="form-label required">Monto</label>
                        <input type="number" class="form-control form-control-sm" name="monto" min="0" required>
                    </div>
                    <div class="col-md-12 mb-6">
                        <label for="" class="form-label required">Descripcion</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" cols="3" rows="3" style="resize: none"></textarea>
                        {{-- <textarea rows="3"  class="form-control" name="descripcion" required> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary btn-sm">Guardar cambios</button>
            </div>
        </form>
      </div>
    </div>
  </div>
