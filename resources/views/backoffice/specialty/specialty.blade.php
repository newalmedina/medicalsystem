@php
    $props = [
        'titulo' => "Areas y especializaciones"
    ];
@endphp
@extends('layout.backoffice.app')

@push('modals')
    @include('backoffice.specialty.add_specialty')
    @include('backoffice.specialty.edit_specialty')
@endpush

@section('content')



<div class="content-wrapper p-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('base.Areas y especializaciones')</h1>
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
                <button class="btn btn-info" data-toggle="modal" data-target="#add_specialty_modal" ><i class="fas fa-spinner"></i> @lang('base.Nueva especialidad')</button>
            </div>
        </div>
      <div class="row">
        {{---Begin speciality section---}}
        <div class="col-12">
            <div class="card border-top border-warning " style="border-top-width: medium;">
                <div class="card-header">
                  <h3 class="card-title">@lang('base.Especialidades')</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>

                  </div>
                </div>
                <div class="card-body text-center" >
                    <table  id="specialtyDataTable" class="table table-bordered table-striped text-left">
                        <thead>
                        <tr>
                          <th>@lang('base.Descripcion')</th>
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
        {{---End speciality section---}}
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('js')
<script>

    $( document ).ready(function() {
        getSpecialty()
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


    function getSpecialty() {
        $("#specialtyDataTable").DataTable({
            ajax: {
                url: "{{route('specialty.getSpecialties')}}",
                dataSrc: ""
                },
            responsive: true,
            autoWidth: false,
            language: dataTableEspañol(),
            columns: [
                { data: null, render: function ( data, type, row ) {
                     return ucfirst(data.description);
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

