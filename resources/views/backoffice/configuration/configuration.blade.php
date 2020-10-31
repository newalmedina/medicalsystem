@php
    $props = [
        'titulo' => "Configuracion"
    ];
@endphp
@extends('layout.backoffice.app')

@section('content')



<div class="content-wrapper p-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('base.Configuracion')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@lang('base.Inicio')</a></li>
              <li class="breadcrumb-item active">@lang('base.Configuracion del centro medico')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
            <div class="card-body" id="card-refresh-content">
              <form class="form-row" action="" method="POST" enctype="multipart/form-data" id="form_configuration">

                <div class="form-group  col-md-6">
                  <label for="hospital_name">@lang('base.Nombre centro medico')</label>
                  <input type="text" class="form-control" placeholder="" name="hospital_name" value="{{ $setting['hospital_name']}}">
                  <div id="hospital_name_error" class="text-danger font-italic"></div>

                </div>
                <div class="form-group  col-md-6">
                  <label for="schedule">@lang('base.Horario de atencion')</label>
                  <input type="text" class="form-control" placeholder="" name="schedule" value="{{ $setting['schedule']}}">
                  <div id="schedule_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="email">@lang('base.Correo electronico')</label>
                  <input type="text" class="form-control" placeholder="" name="email" value="{{ $setting['email']}}">
                  <div id="email_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="phone_number">@lang('base.Telefono de contacto')</label>
                  <input type="tel" class="form-control" placeholder="" id="phone_number" name="phone_number" value="{{ $setting['phone_number']}}">
                  <div id="phone_number_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-12">
                  <label for="phone_number">@lang('base.Direccion')</label>
                  <textarea class="form-control" name="direction" id="" cols="30" rows="3">{{ $setting['direction']}}</textarea>
                  <div id="direction_error" class="text-danger font-italic"></div>
                </div>

                <div class="form-group col-2 ">
                  <label for="document">@lang('base.logo')</label><br>
                  <input   type="file" id="file" name="file">
                </div>
                <div class="form-group  col-12 text-center"  id="resource">

                </div>
                <div class="form-group  col-md-12">
                  <input class="btn btn-success" type="submit">
              </div>
            </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('js')
<script>
  $( document ).ready(function() {
    getConfigResource();
  });

   $('#form_configuration').submit(function(e) {
        e.preventDefault();

        $('#phone_number').val();
        var formData = new FormData(this);

       $.ajax({
            type: "post",
            url: '{{ route('configuration.store') }}',
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
              loading();
              $("#hospital_name_error").text("");
              $("#schedule_error").text("");
              $("#email_error").text("");
              $("#phone_number_error").text("");
              $("#direction_error").text("");

            },
            success: function(data) {
              alertMessage('success',' Operacion realizada correctamente');
              getConfigResource();
              $("#file").val("");
            },
             error: function (response) {
              if (response.status == 422) { // when status code is 422, it's a validation issue
                 $("#hospital_name_error").text(response.responseJSON.errors.hospital_name);
                 $("#schedule_error").text(response.responseJSON.errors.schedule);
                 $("#email_error").text(response.responseJSON.errors.email);
                 $("#phone_number_error").text(response.responseJSON.errors.phone_number);
                 $("#direction_error").text(response.responseJSON.errors.direction);
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
    $(document).on('click', '#delete_resource', function(e){
        e.preventDefault();

        Swal.fire({
            title: "{{ __('base.¿Estás segur@?') }}",
            text: "{{ __('base.Esta acción no se puede deshacer') }}",
        icon: "warning",
            showCancelButton: true,
            confirmButtonText: "{{ __('base.Sí, borrar') }}",
            cancelButtonText: "{{ __('base.Cancelar') }}",
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: '{{ url('backoffice/configuration-delete-resorce/') }}',
                    beforeSend: function() {
                        loading();
                    },
                    success: function(data) {
                        alertMessage('success',' Operacion realizada correctamente');
                        getConfigResource();
                    },
                    error: function (response) {
                        alertMessage('error',' No se ha podido procesar la operacion contacte con el programador');
                    },
                    complete: function() {
                    }
                });
            }
        });
    });

    function getConfigResource(){
      $.get('{{ route('configuration.getConfigResource') }}', function (data) {
          $("#resource").html(data);
      });
    }


</script>

@endpush

