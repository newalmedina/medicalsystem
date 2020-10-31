
<div class="modal fade" id="add_personal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form id="specialty_add_form" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('base.Nuevo personal')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body form-row">
            {{--
            <div class="form-group col-md-6">
                <label for="name" class="col-form-label">@lang('base.Nombre')</label>
                <input type="text" name="name" class="form-control" id="">
                <div name='name_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-6">
                <label for="surname" class="col-form-label">@lang('base.Apellidos')</label>
                <input type="text" name="surname" class="form-control" id="">
                <div name='surname_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-6">
                <label for="identification" class="col-form-label">@lang('base.Identificacion')</label>
                <input type="text" name="identification" class="form-control" id="">
                <div name='identification_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="col-form-label">@lang('base.Correo')</label>
                <input type="text" name="email" class="form-control" id="">
                <div name='email_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-3">
                <label for="phone_number" class="col-form-label">@lang('base.Telefono')</label>
                <input type="text" name="phone_number" class="form-control" id="">
                <div name='phone_number_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-3">
                <label for="born_date" class="col-form-label">@lang('base.Fecha nacimiento')</label>
                <input type="text" name="born_date" class="form-control" id="">
                <div name='born_date_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-2">
                <label for="is_active" class="col-form-label">@lang('base.Activo')</label>
                <input type="checkbox" name="is_active" class="form-control" id="">
                <div name='is_active_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-2">
                <label for="is_admin" class="col-form-label">@lang('base.Admin')</label>
                <input type="checkbox" name="is_admin" class="form-control" id="">
                <div name='is_admin_error' class="text-danger font-italic "></div>
            </div>
            <div class="form-group col-md-2">
                <label for="is_admin" class="col-form-label">@lang('base.Admin')</label>
                <input type="checkbox" name="is_admin" class="form-control" id="">
                <div name='is_admin_error' class="text-danger font-italic "></div>
            </div>
            --}}
            <!-- SmartWizard html -->
            <div id="smartwizard" style="width: 100%">

                <ul class="nav">
                    <li class="nav-item">
                    <a class="nav-link" href="#step-1">
                        <strong>Step 1</strong> <br>This is step description
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#step-2">
                        <strong>Step 2</strong> <br>This is step description
                    </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div id="step-1" class="tab-pane " role="tabpanel" aria-labelledby="step-1">
                        <h3>Step 1 Content</h3>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                        <h3>Step 2 Content</h3>
                        <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
                    </div>

                </div>
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
 $( document ).ready(function() {



            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows', // default, arrows, dots, progress
                // darkMode: true,
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    toolbarPosition: 'both', // both bottom
                    toolbarExtraButtons: [btnFinish, btnCancel]
                }
            });


});
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




