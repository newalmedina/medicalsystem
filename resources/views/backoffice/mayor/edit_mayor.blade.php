@push('modals')
<div class="modal fade" id="add_mayor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="specialty_edit_form" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">@lang('base.Editar area')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="mayor_name" class="col-form-label">@lang('base.Descripcion')</label>
                <input type="text" name="mayor_name" class="form-control" id="mayor_name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success">@lang('base.Actualizar')</button>
        </div>
      </form >
    </div>
  </div>
@endpush

