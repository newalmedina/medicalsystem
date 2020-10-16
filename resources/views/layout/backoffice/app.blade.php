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
   </style>
    @stack('css')
</head>
<body class="blockpage hold-transition sidebar-mini layout-fixed">
    @stack('modals')
   
    <div class="wrapper">
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

        
    </script>
    @stack('js')
</body>
</html>
