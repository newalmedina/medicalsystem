
<div class="modal fade" id="edit_specialty_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
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
                <label for="specialty_name" class="col-form-label">@lang('base.Descripcion')</label>
                <input type="text" name="specialty_name" class="form-control" >
                <div name='specialty_name_error' class="text-danger font-italic "></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">@lang('base.Actualizar')</button>
        </div>
      </form >
    </div>
  </div>
@push('js')
    <script>
        $(document).on('click', '.edit_specialty', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');

            $.ajax({
                type: "get",
                url: '{{ url('backoffice/specialty-show/') }}'+'/'+id,
                beforeSend: function() {
                    loading();
                },
                success: function(data) {
                    $("#specialty_edit_form input[name=specialty_name]").val(data.description);
                    $("#specialty_edit_form div[name=specialty_name_error]").text("");
                    $('#specialty_edit_form').attr('data-id', data.id);
                    $('#edit_specialty_modal').modal('toggle');

                    swal.close();
                },
                error: function (response) {
                    alertMessage('error',' No se ha podido procesar la operacion contacte con el programador');
                },
                complete: function() {
                }
            });
        });
        $('#specialty_edit_form').submit(function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            var formData = new FormData(this);
            $.ajax({
                type: "post",
                url: '{{ url('backoffice/specialty-update/') }}'+'/'+id,
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    loading();
                    $("#specialty_edit_form div[name=specialty_name_error]").text("");
                },
                success: function(data) {
                    alertMessage('success',' Operacion realizada correctamente');
                    clearFieldsSpecialty("specialty_edit_form");
                    closeModal("edit_specialty_modal");
                    reLoadSpecialty();
                },
                error: function (response) {
                if (response.status == 422) { // when status code is 422, it's a validation issue
                    $("#specialty_edit_form div[name=specialty_name_error]").text(response.responseJSON.errors.specialty_name);

                    console.log(response.responseJSON.errors);

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

