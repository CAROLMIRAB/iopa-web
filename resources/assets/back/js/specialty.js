var Specialty = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');
            var title_before = $('#name').val();
            $('#name').change(function () {
                var title = $('#name').val();
                var id_specialty = $('#id_specialty').val();
                $("#btn-save").button('loading');
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title_before: title_before,
                        title: title,
                        id: id_specialty,
                        mod: 'specialty'
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

        editHTML: function () {
            $('#body').summernote({
                height: 200
            });
        },


        editSpecialty: function () {
            var $form = $('#specialty');
            var v = $('#specialty').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    body: "required"
                },
                messages: {
                    name: {
                        required: "El título es un campo requerido",
                        minlength: "Escriba un título más largo"
                    },
                    body: "No ha agregado contenido",
                },
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("specialty"));
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

        createSpecialty: function () {
            var $form = $('#specialty');
            var v = $form.validate({
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
                e.preventDefault();
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("specialty"));
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
                            $('#specialty')[0].reset();
                            $("#body").summernote("reset");
                            $("#image-preview").css('background-image', '');
                            $(".invalid-feedback").html('');
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


        allSpecialties: function () {
            var route = $('.datatable-specialties').data('route');
            var table = $('.datatable-specialties').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[4, "desc"]],
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
                        data: 'status',
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button;
                            if (data == "DRAFT") {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" data-on="Publicado" data-off="Borrador" data-onstyle="info" data-size="small">';
                            } else {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" checked data-on="Publicado" data-off="Borrador"  data-onstyle="info" data-size="small">';
                            }
                            return button;
                        }
                    },
                    {
                        data: 'route',
                        visible: false
                    },
                    {
                        data: 'id',
                        visible: false
                    },

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
                ],
                fnInitComplete: function () {
                    $('.toggle-check').bootstrapToggle();
                    $(".datatable-specialties").css("width", "100%");
                },
                fnDrawCallback: function() {
                    $('.toggle-check').bootstrapToggle();
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },

        changeStatus: function () {
            $(document).on('click', '.toggle', function () {
                var $input = $(this).find('input.toggle-check');
                var status = ($input.is(':checked')) ? 'PUBLISHED' : 'DRAFT';
                $.ajax({
                    type: 'post',
                    url: $('.datatable-specialties').data('route-status'),
                    data: {
                        id: $input.data('id'),
                        status: status
                    }
                }).done(function (data) {
                   
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                   
                });
            });
        },

        selectSpecialty: function (datajson) {
            var $specialtySearch = $('#specialty');

            $specialtySearch.select2({
                multiple: true,
                tags: false,
                placeholder: "...",
                maximumSelectionSize: 6,
                minimumInputLength: 1,
                tokenSeparators: [",", " "],
                createTag: function (item) {
                    return {
                        id: item.term,
                        text: item.term,
                    };
                },
                templateResult: function (item) {
                    return item.name;
                },
                templateSelection: function (item) {
                    return item.name;
                },
                escapeMarkup: function (markup) { return markup; },
                ajax: {
                    url: $specialtySearch.data('route'),
                    dataType: "json",
                    global: false,
                    cache: true,
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {

                        return {
                            results: data.data.tags,
                        };
                    }
                }
            });

        },

        selectSpecialtyEdit: function () {
            $("#specialty").select2({
                tags: false,
                multiple: true,
                tokenSeparators: [',', ' ']
            })
        },

    }
}();