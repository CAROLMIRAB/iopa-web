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

    function tableTr(img, ges, cuenta, cuenta_title, ky) {
        var tr = '<tr>'
        tr += '<td width="35%">'
        tr += '<img src="' + img + '" width="100%">'
        tr += ' </td>'
        tr += '<td width="30%">'
        tr += '<ul class="is-ges">'
        tr += ges
        tr += '</ul>'
        tr += ' </td>'
        tr += '<td width="30%">'
        tr += cuenta_title
        tr += ' <ul class="is-cu">'
        tr += cuenta
        tr += ' </ul>'
        tr += '</td>'
        tr += '<td width="5%">'
        tr += '<button class="btn btn-primary min-tr" data-key="' + ky + '"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>'
        tr += '</td>'
        tr += '</tr>'
        return tr;
    }

    return {



        minTr: function () {
            var wrapper = $('.table-isapres > tbody');
            var x = 1;


            $(wrapper).on('click', '.min-tr', function (e) {
                e.preventDefault();
                var tr = $(this).parents('tr').index() - 1;
                var slug = $('#isapre_slug').val();
                $(this).parents('tr').remove();
                $.ajax({
                    type: 'post',
                    url: $('#isapre_add').data('route'),
                    data: {
                        index: $(this).data('key'),
                        slug: slug
                    },
                    dataType: "json"
                }).done(function (data) {
                    toastr.success(data.message, '!Exitoso!');

                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addisapre').button('reset');
                });
                return false;
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
                    var cuenta_title = '';
                    var cuenta = '';
                    var image = ''
                    var ges = '';
                    var ky = '';
                    var json = JSON.parse(data.data);
                    if (data.status == 400) {
                        $.each(json, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    }
                    if (data.status == 200) {
                        console.log(json);
                        $.each(json, function (k, val) {
                            ky = k;
                            image = val.image;
                            $.each(val, function (key, value) {
                                if (key == 'ges') {
                                    $.each(value, function (keyg, valueg) {
                                        ges += '<li>' + valueg.name + '</li>';
                                    });
                                }
                                if (key == 'account') {
                                    cuenta_title = value.title;
                                    $.each(value.content, function (keyc, valuec) {
                                        cuenta += '<li>' + valuec.name + '</li>';
                                    });
                                }
                            });
                        });

                        var tr = tableTr(image, ges, cuenta, cuenta_title, ky);
                        $('.table-isapres tbody').append(tr);
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



        saveIsapre: function () {
            var $form = $('#isapre');
            $('#isapre-btn-save').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("isapre"));
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (data) {
                    toastr.success(data.message, '!Exitoso!');
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#isapre-btn-save').button('reset');
                });
                return false;
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