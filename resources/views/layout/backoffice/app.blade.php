<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $titulo ?? '' }} |{{env('APP_NAME')}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layout.backoffice.links')
    <style>
        .tab-content{
            height: auto !important;
            width: 100% !important;
        }
   </style>
    @stack('css')
</head>
<body class="blockpage hold-transition sidebar-mini layout-fixed">
    @stack('modals')

    {{--DELEATING TEMPORAL FILES BY USER--}}

    <div class="wrapper">
        <div hidden>
        </div>
        <!-- Navbar -->
             @include('layout.backoffice.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container MENU -->
            @include('layout.backoffice.menu')
        <!-- Content Wrapper. Contains page content -->
            @yield('content')
        <!-- /.content-wrapper -->
             @include('layout.backoffice.footer')

        <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layout.backoffice.script')
    <script type="text/javascript">
         $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function alertMessage(icon, message){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            });

            Toast.fire({
            icon: icon,
            title: message
            });
        }

        function loading(){
            Swal.fire({
                title: '<h3>{{__("base.Un momento por favor!")}}</h3>',
                html: '<p class="text-warning" >{{__("base.Procesando peticion")}}</p>',// add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
        }


        function closeModal(modalid){
            $('.modal-backdrop').remove();
            $('#'+modalid).modal("toggle");
        }

        function capitalize(word) {
            return word[0].toUpperCase() + word.slice(1);
        }
        function dataTableEspañol(){
            return idioma=
            {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                "infoFiltered": "",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            ;
        }

        function ucfirst(string){
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

       </script>
    @stack('js')
</body>
</html>
