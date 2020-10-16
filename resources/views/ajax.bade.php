<script>
    //ajax step
    //store
    $('#form_new_course').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "post",
            url: '{{ route('
            courses.store ') }}',
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                KTApp.block('.blockpage', {
                    overlayColor: '#000000',
                    state: 'warning', // a bootstrap color
                    size: 'lg' //available custom sizes: sm|lg
                });
                $('#modalNewCurso').modal('hide');
            },
            success: function(data) {
                KTApp.unblock('.blockpage');

                Swal.fire(
                    "{{ __('base.Guardado') }}",
                    "{{ __('base.Registro guardado') }}",
                    "success"
                );
                id = 0;

                $.get('{{url('
                    admin / get - subcategory / ')}}/' + id,
                    function(data) {
                        $("#subCategoryResult").html(data);
                    });
                clear_fields("form_new_course");
                getCourses();



            },
            complete: function() {
                KTApp.unblock('.blockpage');

            },
        });

    });

    //update
    $('#form_edit_course').submit(function(e) {
        e.preventDefault();

        let id = $(this).attr('data-id');
        var formData = new FormData(this);

        $.ajax({
            type: "post",
            url: '{{ url('
            admin / courses / update / ') }}/' + id,
            dataType: 'json',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                KTApp.block('.blockpage', {
                    overlayColor: '#000000',
                    state: 'warning', // a bootstrap color
                    size: 'lg' //available custom sizes: sm|lg
                });


                $('#modalEditCourse').modal('hide');
            },
            success: function(data) {
                Swal.fire(
                    "{{ __('base.Actualizado') }}",
                    "{{ __('base.Registro actualizado') }}",
                    "success"
                );
                console.log(data);

                getCourses();
                $("#form_edit_course div[name=url]").hide();
                $("#form_edit_course input[name=url]").val("");
                $("#form_edit_course div[name=video_file]").hide();
                $("#form_edit_course input[name=video_file]").val("");
            },
            complete: function() {
                KTApp.unblock('.blockpage');
                clear_fields("form_edit_course");
            },
        });
    });
</script>