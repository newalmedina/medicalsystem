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
        .dropzone{
            border: 3px dashed #29CBE1 !important;
            border-radius: 5px !important;
            background: white !important;
           }
   </style>
    @stack('css')
</head>
<body class="blockpage hold-transition sidebar-mini layout-fixed">
    @stack('modals')

    {{--DELEATING TEMPORAL FILES BY USER--}}

    <div class="wrapper">
        <div hidden>
            {{U::deleteTemporalFile()}}
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




        function dropzone(numFiles){
            var uploadedDocumentMap = {}
            Dropzone.options.documentDropzone = {
            url: '{{ route('temporalFiles.storeMedia') }}',
            maxFilesize: 1, // MB
            maxFiles: numFiles,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                name = file.file_name
                } else {
                name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
            }
        }

        function clearDropzone(){
            Dropzone.forElement("#document-dropzone").removeAllFiles(true);
            $('form').find('input[name="document[]"]').remove();
        }
    </script>
    @stack('js')
</body>
</html>
