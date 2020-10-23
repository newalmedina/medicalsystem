@php
    $props = [
        'titulo' => "Areas y especializaciones"
    ];
@endphp
@extends('layout.backoffice.app')

@section('content')

@include('backoffice.mayor.add_mayor')
@include('backoffice.specialty.add_specialty')

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
                <button class="btn btn-info mr-2" data-toggle="modal" data-target="#add_mayor_modal"><i class="fas fa-spinner"></i> @lang('base.Nueva area')</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#add_specialty_modal" ><i class="fas fa-spinner"></i> @lang('base.Nueva especialidad')</button>
            </div>
        </div>
      <div class="row">
            {{---Begin Areas section---}}
            <div class="col-md-6">
                <div class="card border-top border-warning " style="border-top-width: medium;">
                    <div class="card-header">
                      <h3 class="card-title">@lang('base.Areas')</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i></button>

                      </div>
                    </div>
                    <div class="card-body">

                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>

        {{---End Area section---}}
        {{---Begin speciality section---}}
        <div class="col-md-6">
            <div class="card border-top border-warning " style="border-top-width: medium;">
                <div class="card-header">
                  <h3 class="card-title">@lang('base.Especialidades')</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>

                  </div>
                </div>
                <div class="card-body">

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


  });


</script>

@endpush

