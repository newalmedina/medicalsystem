@php
    $props = [
        'titulo' => __('base.Configuracion')
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
              <form id="form_configuration" action=""method="post" enctype="multipart/form-data" class="form-row ">
                <div class="form-group  col-md-6">
                  <label for="hospital_name">@lang('base.Nombre centro medico')</label>
                  <input type="text" class="form-control" placeholder="" name="hospital_name" value="{{ isset($setting['hospital_name']) ? $setting['hospital_name'] :""}}">                  
                  <div id="hospital_name_error" class="text-danger font-italic"></div>
                
                </div>
                <div class="form-group  col-md-6">
                  <label for="schedule">@lang('base.Horario de atencion')</label>
                  <input type="text" class="form-control" placeholder="" name="schedule" value="{{  isset($setting['schedule']) ? $setting['schedule'] :""}}">
                  <div id="schedule_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="email">@lang('base.Correo electronico')</label>
                  <input type="text" class="form-control" placeholder="" name="email" value="{{  isset($setting['email']) ? $setting['email'] :""}}">
                  <div id="email_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="phone_number">@lang('base.Telefono de contacto')</label>
                  <input type="tel" class="form-control" placeholder="" id="phone_number" name="phone_number" value="{{ isset($setting['phone_number']) ? $setting['phone_number'] :""}}">
                  <div id="phone_number_error" class="text-danger font-italic"></div>
                </div>
                <div class="form-group  col-md-6">
                  <label for="direction">@lang('base.Direccion')</label>
                  <textarea name="direction" class="form-control" id="" cols="30" rows="3">{{  isset($setting['direction']) ? $setting['direction'] :""}}</textarea>       
                  <div id="direction_error" class="text-danger font-italic"></div>           
                </div>
                <div class="form-group  col-md-6 dropzone" id="myDropzone">
                  <input hidden id="file" name="file"/>
                </div>                
                </div>
                <button type="submit_error" class="btn btn-primary">@lang('base.Guardar')</button>
            
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
 
 /*Dropzone.options.myDropzone= {
    url: '{{url("/")}}',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("firstname", jQuery("#firstname").val());
            formData.append("lastname", jQuery("#lastname").val());
        });
    }
}*/

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
              $.blockUI({ message: '<h2 style="color:blue;" ><img width="120" src="{{asset("placeholders/loading.gif")}}" /> Un momento por favor!</h2>' });
              $("#hospital_name_error").text("");
              $("#schedule_error").text("");
              $("#email_error").text("");
              $("#phone_number_error").text("");
              $("#direction_error").text("");
            },
            success: function(data) {
              alertMessage('success',' Registro guardado correctamente');
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
              $.unblockUI(); 
            }
        });

    });
</script>
    
@endpush