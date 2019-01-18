var Surgery = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');

            $('#name').focusout(function () {
                var title = $('#name').val();
                var id_surgery = $('#id_surgery').val();
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title: title,
                        id: id_surgery,
                        mod: 'surgery'
                    },
                }).done(function (data) {
                    $('#slug').val(data.data.slug);

                }).fail(function (data) {

                }).always(function () {

                });
            }).change();

        },

        editHTML: function () {
            $('#body').summernote({
                height: 200
            });
        },

        createSurgery: function () {
            var $form = $('#surgery');
            var v = $('#surgery').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    body: "required",
                    image: "required"
                },
                messages: {
                    name: {
                        required: "El título es un campo requerido",
                        minlength: "Escriba un título más largo"
                    },
                    body: "No ha agregado contenido",
                    image: "No ha agregado una imagen"
                },
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                $(this).button('loading');
                if ($form.valid()) {
                    var formData = new FormData(document.getElementById("surgery"));
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
                            $('#surgery')[0].reset();
                            $("#body").summernote("reset");
                            $("#image-preview").css('background-image', '');
                            $(".invalid-feedback").html('');
                            $('#office').val(null).trigger('change');
                        }
                    }).fail(function (data) {
                        toastr.error(data.message, '!Error!');
                    }).always(function () {
                        $('#btn-save').button('reset');
                    });
                    return false;
                }
            });

            $('#body').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
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


        allSurgeries: function () {
            var route = $('.datatable-surgeries').data('route');
            var table = $('.datatable-surgeries').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[4, "asc"]],
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
                        data: 'status',
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button;
                            if (data == "DRAFT") {
                                button = '<span class="badge badge-default">Borrador</span>';
                            } else {
                                button = '<span class="badge badge-success">Publicado</span>';
                            }
                            return button;
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