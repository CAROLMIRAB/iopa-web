var Exams = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');
            var title_before = $('#name').val();
            $('#name').change(function () {
                var title = $('#name').val();
                var id_exam = $('#id_exam').val();
                $("#btn-save").button('loading');
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title_before: title_before,
                        title: title,
                        id: id_exam,
                        mod: 'exam'
                    },
                }).done(function (data) {
                    $('#slug').val(data.data.slug);
                    var html = $('#slug-url').data('slug');
                    var url = html + "/" + data.data.slug;
                    $('#slug-url').html(url);
                    $('#slug-url').attr('href', url);

                }).fail(function (data) {

                }).always(function () {
                    $('#btn-save').button('reset');
                });
            }).change();
        },

        createExam: function () {
            var $form = $('#exam');
            var v = $('#exam').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    description: "required",
                    image: "required"
                },
                messages: {
                    name: {
                        required: "El título es un campo requerido",
                        minlength: "Escriba un título más largo"
                    },
                    description: "No ha agregado contenido",
                    image: "No ha agregado una imagen"
                },
                ignore: ":hidden, [contenteditable='true']:not([description])"
            });

            $('#btn-save').click(function (e) {
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("exam"));
                    $.ajax({
                        type: 'post',
                        url: $form.attr('action'),
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                        if (data.status == 400) {
                            $.each(data.data, function (key, value) {
                                $('.' + key + '-error').html(value);
                            });
                        }
                        if (data.status == 200) {
                            toastr.success(data.message, '!Exitoso!');
                            $('#exam')[0].reset();
                            $("#body").summernote("reset");
                            $("#image-preview").css('background-image', '');
                            $(".invalid-feedback").html('');
                            $('#office').val(null).trigger('change');
                            var html = $('#slug-url').data('slug');
                            $('#slug-url').html(html);
                        }
                    }).fail(function (data) {
                        toastr.error(data.message, '!Error!');
                    }).always(function () {
                        $('#btn-save').button('reset');
                    });
                    return false;
                }
            });

            $('#description').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
            });
        },

        editExam: function () {
            var $form = $('#exam');
            var v = $('#exam').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    description: "required",
                },
                messages: {
                    name: {
                        required: "El título es un campo requerido",
                        minlength: "Escriba un título más largo"
                    },
                    description: "No ha agregado contenido",
                },
                ignore: ":hidden, [contenteditable='true']:not([description])"
            });

            $('#btn-save').click(function (e) {
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("exam"));
                    $.ajax({
                        type: 'post',
                        url: $form.attr('action'),
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                        if (data.status == 400) {
                            $.each(data.data, function (key, value) {
                                $('.' + key + '-error').html(value);
                            });
                        }
                        if (data.status == 200) {
                            toastr.success(data.message, '!Exitoso!');
                        }
                    }).fail(function (data) {
                        toastr.error(data.message, '!Error!');
                    }).always(function () {
                        $('#btn-save').button('reset');
                    });
                    return false;
                }
            });

            $('#description').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
            });
        },

        editHTML: function () {
            $('#preparation').summernote({
                height: 200
            });
            $('#description').summernote({
                height: 200
            });
            $('#indications').summernote({
                height: 200
            });
        },

        imageUpload: function (image) {
            $.uploadPreview({
                input_field: "#image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });

        },


        allExams: function () {
            var route = $('.datatable-exams').data('route');
            var table = $('.datatable-exams').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[1, "asc"]],
                columns: [
                    {
                        data: 'name',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = '<a href="' + row.route + '">' + data + '</a>';
                            return concat;
                        }
                    },
                    {
                        data: 'created',
                        width: "120px"
                    },
                    {
                        data: 'route',
                        visible: false
                    },
                    {
                        data: 'id',
                        visible: false
                    }

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
                ],
                fnInitComplete: function () {

                    $(".datatable-posts").css("width", "100%");
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },

    }
}();