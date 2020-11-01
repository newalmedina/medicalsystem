@php
    $props = [
        'titulo' => "Areas y especializaciones"
    ];
@endphp
@extends('layout.backoffice.app')

@push('modals')
    @include('backoffice.personal.add_personal')
    @include('backoffice.personal.edit_personal')
@endpush

@section('content')



<div class="content-wrapper p-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('base.Personal hospitalario')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@lang('base.Inicio')</a></li>
              <li class="breadcrumb-item active">@lang('base.Area / Specializaciones')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end mb-5">
                <button class="btn btn-info" data-toggle="modal" data-target="#add_personal_modal" ><i class="fas fa-spinner"></i> @lang('base.Nuevo personal')</button>
            </div>
        </div>
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
      <div class="row">
        {{---Begin Medicos section---}}
        <div class="col-md-6 mt-4">
            <div class="card border-top border-warning " style="border-top-width: medium;">
                <div class="card-header">
                  <h3 class="card-title">@lang('base.Medicos')</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>

                  </div>
                </div>
                <div class="card-body text-center" >
                    <table  id="doctorDataTable" class="table table-bordered table-striped text-left">
                        <thead>
                        <tr>
                          <th>@lang('base.Nombre')</th>
                          <th  width="15">@lang('base.Acciones')</th>
                        </tr>
                        </thead>
                        <tbody class="" >

                        </tbody>
                      </table>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
        {{---End Medicos section---}}
        {{---Begin secretaria section---}}
        <div class="col-md-6 mt-4">
            <div class="card border-top border-warning " style="border-top-width: medium;">
                <div class="card-header">
                  <h3 class="card-title">@lang('base.Secretaria')</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>

                  </div>
                </div>
                <div class="card-body text-center" >
                    <table  id="secretaryDataTable" class="table table-bordered table-striped text-left">
                        <thead>
                        <tr>
                          <th>@lang('base.Nombre')</th>
                          <th  width="15">@lang('base.Acciones')</th>
                        </tr>
                        </thead>
                        <tbody class="" >

                        </tbody>
                      </table>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
        {{---End secretaria section---}}
        {{---Begin administradores section---}}
        <div class="col-12 mt-4">
            <div class="card border-top border-warning " style="border-top-width: medium;">
                <div class="card-header">
                  <h3 class="card-title">@lang('base.Administradores')</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>

                  </div>
                </div>
                <div class="card-body text-center" >
                    <table  id="adminDataTable" class="table table-bordered table-striped text-left">
                        <thead>
                        <tr>
                          <th>@lang('base.Nombre')</th>
                          <th  width="15">@lang('base.Acciones')</th>
                        </tr>
                        </thead>
                        <tbody class="" >

                        </tbody>
                      </table>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
        {{---End administradores section---}}
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('js')
<script>

    $( document ).ready(function() {
        getDoctors();
        getSecretaries();
        getAdmins();
    });


    $(document).on('click', '.delete_specialty', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');

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
                    url: '{{ url('backoffice/specialty-delete/') }}'+'/'+id,
                    beforeSend: function() {
                        loading();
                    },
                    success: function(data) {
                        alertMessage('success',' Operacion realizada correctamente');
                        reLoadSpecialty();
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


    function getDoctors() {
        $("#doctorDataTable").DataTable({
            ajax: {
                url: "{{route('personal.getDoctors')}}",
                dataSrc: ""
                },
            responsive: true,
            autoWidth: false,
            language: dataTableEspañol(),
            columns: [
                { data: null, render: function ( data, type, row ) {
                     return ucfirst(data.name);
                } },
                { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return '<div class="text-center"><a data-toggle="tooltip"  title="Editar" href="" data-id="'+data.id+'" class="edit_specialty text-info"><i class="fas fa-edit"></i></a>\
                        <a href="" data-id="'+data.id+'" class="delete_specialty text-danger" data-toggle="tooltip"  title="Eliminar"><i class="fas fa-trash-alt"></i></a></div>'
                } },
            ]
        });
    }
    function getSecretaries() {
        $("#secretaryDataTable").DataTable({
            ajax: {
                url: "{{route('personal.getSecretaries')}}",
                dataSrc: ""
                },
            responsive: true,
            autoWidth: false,
            language: dataTableEspañol(),
            columns: [
                { data: null, render: function ( data, type, row ) {
                     return ucfirst(data.name);
                } },
                { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return '<div class="text-center"><a data-toggle="tooltip"  title="Editar" href="" data-id="'+data.id+'" class="edit_specialty text-info"><i class="fas fa-edit"></i></a>\
                        <a href="" data-id="'+data.id+'" class="delete_specialty text-danger" data-toggle="tooltip"  title="Eliminar"><i class="fas fa-trash-alt"></i></a></div>'
                } },
            ]
        });
    }
    function getAdmins() {
        $("#adminDataTable").DataTable({
            ajax: {
                url: "{{route('personal.getAdmins')}}",
                dataSrc: ""
                },
            responsive: true,
            autoWidth: false,
            language: dataTableEspañol(),
            columns: [
                { data: null, render: function ( data, type, row ) {
                     return ucfirst(data.name);
                } },
                { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return '<div class="text-center"><a data-toggle="tooltip"  title="Editar" href="" data-id="'+data.id+'" class="edit_specialty text-info"><i class="fas fa-edit"></i></a>\
                        <a href="" data-id="'+data.id+'" class="delete_specialty text-danger" data-toggle="tooltip"  title="Eliminar"><i class="fas fa-trash-alt"></i></a></div>'
                } },
            ]
        });
    }

  function reLoadSpecialty() {
        $("#specialtyDataTable").DataTable().ajax.reload();
    }
  function clearFieldsSpecialty(form){
    $("#"+form+" input[name=specialty_name]").val("");
   }

  function clearFieldsSpecialty(form){
    $("#"+form+" input[name=specialty_name]").val("");
    }
</script>

@endpush

