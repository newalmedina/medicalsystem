@push('modals')
<div class="modal fade" id="add_specialty_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="mayor_edit_form" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('base.Editar especialidad')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="specialty_name" class="col-form-label">@lang('base.Descripcion')</label>
                <input type="text" name="specialty_name" class="form-control" id="specialty_name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">@lang('base.Actualizar')</button>
        </div>
      </form >
    </div>
  </div>
@endpush

