var Agreement = function () {
    var fieldHTML = "";
    fieldHTML += '<div class="field_row row">'
    fieldHTML += '<div class="col-11">';
    fieldHTML += '<div class="form-group">';
    fieldHTML += '<label for="fonasa-subtitle">Titulo</label>'
    fieldHTML += '<input id="fonasa-subtitle" name="fonasa-subtitle[]" class="form-control"></textarea>';
    fieldHTML += '</div>';
    fieldHTML += '<div class="form-group">';
    fieldHTML += '<textarea id="fonasa-subdescription" name="fonasa-subdescription[]" class="form-control"></textarea>';
    fieldHTML += '</div>';
    fieldHTML += '</div>';
    fieldHTML += '<div class="col-1">';
    fieldHTML += '<div class="form-group">';
    fieldHTML += '<label for="subadd"> </label>';
    fieldHTML += '<button id="remove-det" class="btn btn-icon btn-2 btn-primary remove_button" type="button">';
    fieldHTML += '<span class="btn-inner--icon">';
    fieldHTML += '<i class="ni ni-fat-delete" style="font-size: 18px"></i>';
    fieldHTML += '</span>';
    fieldHTML += '</button>';
    fieldHTML += '</div>';
    fieldHTML += '</div>';
    fieldHTML += '</div>'

    function tableTr(number) {
        var tr = '<tr>'
        tr += '<td width="40%">'
        tr += '<div style="" id="isapre-image-preview-' + number + '" class="table-img-prev" class="">'
        tr += '<label for="image-upload" id="isapre-image-label-' + number + '"><i class="ni ni-cloud-download-95"></i></label>'
        tr += '<input type="file" name="isapre-image" id="isapre-image-' + number + '" class="isapre-image" accept="image/png, image/jpeg" />'
        tr += '</div>'
        tr += ' </td>'
        tr += '<td width="25%">'
        tr += ' <ul class="is-ges">'
        tr += '<li><input type="text" name="isapre-ges[]" />'
        tr += '<a   class="add-ges-inp">'
        tr += '<i class="ni ni-fat-add " style="font-size: 22px"></i>'
        tr += ' </a>'
        tr += '</li>'
        tr += '</ul>'
        tr += ' </td>'
        tr += '<td width="25%">'
        tr += ' <ul class="is-cu">'
        tr += '<li><input type="text" name="isapre-cuenta[]" />'
        tr += ' <a class="add-cu-inp">'
        tr += '<i class="ni ni-fat-add " style="font-size: 22px"></i>'
        tr += '</a>'
        tr += '</li>'
        tr += ' </ul>'
        tr += '</td>'
        tr += '<td width="10%">'
        tr += '<button type="button" class="btn btn-icon btn-2 btn-primary min-tr">'
        tr += '<i class="ni ni-fat-delete" style="font-size: 18px"></i>'
        tr += '</button>'
        tr += '</td>'
        tr += '</tr>'
        return tr;
    }

    return {



        addTr: function () {
            var maxField = 10;
            var addButton = $('.add_tr');
            var wrapper = $('.table-isapres tbody');
            var x = 1;


            $(addButton).click(function () {
                if (x < maxField) {
                    var tr = tableTr(x);
                    x++;
                    $(wrapper).append(tr);
                }
            });


            $(wrapper).on('click', '.min-tr', function (e) {
                e.preventDefault();
                $(this).parents('tr').remove();
                x--;
            });
        },

        addFon: function () {
            var maxField = 10;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var x = 1;

            $(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });


            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parents('.field_row').remove();
                x--;
            });
        },

        addGes: function () {
            var input = '<li><div class="input-group input-group-sm mb-3">' +
                '<input type="text" class="form-control input-sm" name="isapreges[]" placeholder="" aria-label="" aria-describedby="basic-addon2">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary min-ges-inp" type="button"><i class="ni ni-fat-delete " style=""></i></button>' +
                '</div>' +
                '</div></li>';
            var maxField = 100;
            var addButton = $('.add-ges-inp');
            var wrapper = $(".is-ges");
            var x = 1;

            $(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    $(wrapper).append(input);
                }
            });

            $(wrapper).on('click', '.min-ges-inp', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
                x--;
            });
        },

        addCu: function () {
            var input = '<li><div class="input-group input-group-sm mb-3">' +
                '<input type="text" class="form-control input-sm" name="isaprecuenta[]" placeholder="" aria-label="" aria-describedby="basic-addon2">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary min-cu-inp" type="button"><i class="ni ni-fat-delete" style=""></i></button>' +
                '</div>' +
                '</div></li>';

            var maxField = 100;
            var addButton = $('.add-cu-inp');
            var wrapper = $(".is-cu");
            var x = 1;

            $(addButton).click(function () {
                if (x < maxField) {
                    x++;
                    $(wrapper).append(input);
                }
            });

            $(wrapper).on('click', '.min-cu-inp', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
                x--;
            });
        },

        imagesUp: function (image) {
            $.uploadPreview({
                input_field: "#isapre-image",
                preview_box: "#isapre-image-preview",
                label_field: "#isapre-mage-label",
                label_default: image,
                label_selected: image
            });
        },

        isapreAdd: function () {
            var $form = $('#isapre_add');
            $('#btn-addisapre').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("isapre_add"));
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
                        $.each(JSON.parse(data.data), function (key, value) {
                            if (key == 'ges') {
                                $.each(value, function (keyy, valuee) {
                                    //console.log(keyy);
                                    console.log(valuee.name);
                                });
                            }
                        });

                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addisapre').button('reset');
                });
                return false;
            });

        },

        editSurgery: function () {
            var $form = $('#surgery');
            var v = $('#surgery').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    description: "required"
                },
                messages: {
                    name: {
                        required: "El título es un campo requerido",
                        minlength: "Escriba un título más largo"
                    },
                    description: "No ha agregado contenido",
                },
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                if ($form.valid()) {
                    $(this).button('loading');
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

        createSurgery: function () {
            var $form = $('#surgery');
            var v = $('#surgery').validate({
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
                ignore: ":hidden, [contenteditable='true']:not([body])"
            });

            $('#btn-save').click(function (e) {
                if ($form.valid()) {
                    $(this).button('loading');
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
                            $("#description").summernote("reset");
                            $("#preparation").summernote("reset");
                            $("#indications").summernote("reset");
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
                    $(".datatable-surgeries").css("width", "100%");
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
                    url: $('.datatable-surgeries').data('route-status'),
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

    }
}();