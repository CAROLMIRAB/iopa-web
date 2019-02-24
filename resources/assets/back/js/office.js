var Offices = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');
            var title_before = $('#name').val();
            $('#name').change(function () {
                var title = $('#name').val();
                var id_post = $('#id_office').val();
                $("#btn-save").button('loading');
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title: title,
                        title_before: title_before,
                        id: id_post,
                        mod: 'office'
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

        createOffice: function () {
            var $form = $('#office');
            var v = $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    phone: {
                        number: true,
                        minlength: 9,
                        required: true
                    },
                    map: "required",
                    address: "required",
                    image: "required"
                },
                messages: {
                    name: {
                        required: "El titulo es un campo requerido",
                        minlength: "Escriba un titulo más largo"
                    },
                    phone: { 
                        number: 'Solo se permiten numeros',
                        minlength: "Escriba un número válido",
                        required: "El número es requerido"
                    },
                    map: "El map es un campo requerido",
                    address: "No ha agregado la dirección",
                    image: "No ha agregado una imagen"
                }
            });

            $('#btn-save').click(function (e) {
                e.preventDefault();
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("office"));
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
                            $('#office')[0].reset();
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
        },

        editOffice: function () {
            var $form = $('#office');
            var v = $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    phone: {
                        number: true,
                        minlength: 9,
                        required: true
                    },
                    map: "required",
                    address: "required"
                },
                messages: {
                    name: {
                        required: "El titulo es un campo requerido",
                        minlength: "Escriba un titulo más largo"
                    },
                    phone: { 
                        number: 'Solo se permiten numeros',
                        minlength: "Escriba un número válido",
                        required: "El número es requerido"
                    },
                    map: "El map es un campo requerido",
                    address: "No ha agregado la dirección"
                }
            });

            $('#btn-save').click(function (e) {
                e.preventDefault();
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("office"));
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
        },

        selectOffice: function (datajson) {
            var $officeSearch = $('#office');

            $officeSearch.select2({
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
                    url: $officeSearch.data('route'),
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

        selectOfficeEdit: function () {
            $("#office").select2({
                tags: false,
                multiple: true,
                tokenSeparators: [',', ' ']
            })
        },

        allOffices: function () {
            var route = $('.datatable-offices').data('route');
            var table = $('.datatable-offices').DataTable({
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
                        data: 'phone',
                        width: "100px"
                    },
                    {
                        data: 'address',
                        width: "100px"
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
                    { className: "cdatatable-td", targets: [3] }
                ],
                fnInitComplete: function () {

                    $(".datatable-offices").css("width", "100%");
                },
                fnDrawCallback: function() {
                    $('.toggle-check').bootstrapToggle();
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },

    
    }
}();