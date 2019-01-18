var Posts = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');
            var title_before = $('#name').val();
            $('#name').focusout(function () {
                var title = $('#name').val();
                var id_post = $('#id_post').val();
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title: title,
                        title_before: title_before,
                        id: id_post,
                        mod: 'post'
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

        eliminateMessages: function () {
            $('#name').blur(function () {
                if (!$(this).val() == '') {
                    $('#name + p').html('');
                }
            })

            $('#excerpt').blur(function () {
                if (!$(this).val() == '') {
                    $('#excerpt + p').html('');
                }
            })

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

        tagsInput: function () {
            $('input[name="tags"]').amsifySuggestags({
                type: 'amsify'
            });
        },

        createPost: function () {
            var $form = $('#post');
            var v = $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    excerpt: "required",
                    body: "required",
                    image: "required"
                },
                messages: {
                    name: {
                        required: "El titulo es un campo requerido",
                        minlength: "Escriba un titulo más largo"
                    },
                    excerpt: "El extracto es un campo requerido",
                    body: "No ha agregado contenido",
                    image: "No ha agregado una imagen"
                },
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                e.preventDefault();
                $(this).button('loading');
                if ($form.valid()) {
                    var formData = new FormData(document.getElementById("post"));
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
                            $('#post')[0].reset();
                            $("#body").summernote("reset");
                            $("#image-preview").css('background-image', '');
                            $(".invalid-feedback").html('');
                            $(".amsify-suggestags-input-area").remove('.amsify-select-tag');
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

        editPost: function () {
            var $form = $('#post');
            var v = $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    excerpt: "required",
                    body: "required",
                    image: "required"
                },
                messages: {
                    name: {
                        required: "El titulo es un campo requerido",
                        minlength: "Escriba un titulo más largo"
                    },
                    excerpt: "El extracto es un campo requerido",
                    body: "No ha agregado contenido",
                    image: "No ha agregado una imagen"
                },
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                $(this).button('loading');
                if ($form.valid()) {
                    var formData = new FormData(document.getElementById("post"));
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

            $('#body').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
            });
        },

        allPosts: function () {
            var route = $('.datatable-posts').data('route');
            var table = $('.datatable-posts').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[4, "desc"]],
                columns: [
                    {
                        data: 'title',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = '<a href="' + row.route + '">' + data + '</a>';
                            return concat;
                        }
                    },
                    {
                        data: 'category',
                        width: "100px"
                    },
                    {
                        data: 'tags',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = "";
                            console.log(row);
                            jQuery.each(data, function (i, val) {
                                concat += '<span class="badge badge-info">' + val + '</span>'
                            });
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
                        width: "120px",
                        visible: false
                    }

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
                    { className: "cdatatable-td", targets: [4] }
                ],
                fnInitComplete: function () {

                    $(".datatable-posts").css("width", "100%");
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },

        datePicker: function () {
            var $dateRange = $('#date-range');
            $dateRange.daterangepicker({
                autoApply: true,
                opens: 'left',
                startDate: moment(),
                endtDate: moment(),
                showDropdowns: true,
                showWeekNumbers: true,
                buttonClasses: ['btn btn-sm'],
                applyClass: ' blue',
                cancelClass: 'default',
                format: 'DD/MM/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Aceptar',
                    cancelLabel: 'Cancelar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    customRangeLabel: 'Rango Personalizado',
                    daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    firstDay: 1
                }
            },
                function (start, end) {
                    $('#date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );

            $('#date-range span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#start_date').val(moment().format('YYYY-MM-DD'));
            $('#end_date').val(moment().format('YYYY-MM-DD'));

            $dateRange.on('apply.daterangepicker', function (ev, picker) {
                $('#start_date').val(picker.startDate.format('YYYY-MM-DD'));
                $('#end_date').val(picker.endDate.format('YYYY-MM-DD'));
            });
        }

    }
}();