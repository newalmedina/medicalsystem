
<div class="modal fade" id="add_specialty_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="specialty_add_form" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('base.Nueva especialidad')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="specialty_name" class="col-form-label">@lang('base.Descripcion')</label>
                <input type="text" name="specialty_name" class="form-control" id="specialty_name">
                <div name='specialty_name_error' class="text-danger font-italic "></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">@lang('base.Guardar')</button>
        </div>
      </form >
    </div>
  </div>
  @push('js')
<script>

$('#specialty_add_form').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
            type: "post",
            url: '{{ route('specialty.store') }}',
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                loading();
                $("#specialty_add_form div[name=specialty_name_error]").text("");
            },
            success: function(data) {
                alertMessage('success',' Operacion realizada correctamente');
                clearFieldsSpecialty("specialty_add_form");
                closeModal("add_specialty_modal");
                reLoadSpecialty();
            },
            error: function (response) {
            if (response.status == 422) { // when status code is 422, it's a validation issue
                $("#specialty_add_form div[name=specialty_name_error]").text(response.responseJSON.errors.specialty_name);
                // display errors on each form field
                alertMessage('error',' Tienes algunos errores de validación');
                return false;
            }

            alertMessage('error',' No se ha podido procesar la operacion contacte con el programador');
            },
            complete: function() {
            }
        });
    });
</script>

@endpush




