var Agreement = function () {

    function tableTrFon(title, description, key) {
        var tr = '<tr>';
        tr += '<td width="20%">';
        tr += title;
        tr += '</td>';
        tr += ' <td width="75%">';
        tr += description;
        tr += '</td>';
        tr += ' <td width="5%">';
        tr += '<button class="btn btn-primary btn-sm min-tr-fon" data-key="' + key + '"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>'
        tr += '</td>';
        tr += '</tr>';

        return tr;

    }


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
        tr += '<button class="btn btn-primary min-tr btn-sm" data-key="' + ky + '"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>'
        tr += '</td>'
        tr += '</tr>'
        return tr;
    }

    return {

        minTrFonasa: function () {
            var wrapper = $('.table-fonasa > tbody');
            $(wrapper).on('click', '.min-tr-fon', function (e) {
                e.preventDefault();
                var tr = $(this).parents('tr').index() - 1;
                var slug = $('#fonasa-slug').val();
                $(this).parents('tr').remove();
                $.ajax({
                    type: 'post',
                    url: $('#fonasa_add').data('route'),
                    data: {
                        index: $(this).data('key'),
                        slug: slug
                    },
                    dataType: "json"
                }).done(function (data) {
                    if (data.status == 200) {
                        toastr.success(data.message, '!Exitoso!');
                    }
                    if (data.status == 400) {
                        toastr.error(data.message, '!Error!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addfonasa').button('reset');
                });
                return false;
            });

        },

        minTr: function () {
            var wrapper = $('.table-isapres > tbody');
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
                    if (data.status == 200) {
                        toastr.success(data.message, '!Exitoso!');
                    }
                    if (data.status == 400) {
                        toastr.error(data.message, '!Error!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addisapre').button('reset');
                });
                return false;
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
                    var ky = '';
                    var cuenta = '';
                    var cuenta_title = '';
                    var ges = '';
                    var image = '';
                    if (data.status == 400) {
                        toastr.error(data.message, '!Error!');
                    }
                    if (data.status == 200) {
                        var json = JSON.parse(data.data);
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

        fonasaAdd: function () {
            var $form = $('#fonasa_add');
            $('#btn-addfonasa').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("fonasa_add"));
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (data) {
                    var title = '';
                    var description = '';
                    var key = '';
                    if (data.status === 400) {
                        toastr.error(data.message, '!Error!');
                    }
                    if (data.status === 200) {
                        var json = JSON.parse(data.data);
                        $.each(json, function (k, val) {
                            key = k;
                            title = val.subtitle;
                            description = val.subdescription;
                        });

                        var tr = tableTrFon(title, description, key);
                        $('.table-fonasa tbody').append(tr);
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addfonasa').button('reset');
                });
                return false;
            });
        },


        saveFonasa: function () {
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

        saveFonasa: function () {
            var $form = $('#fonasa');
            $('#fonasa-btn-save').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("fonasa"));
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
                    $('#fonasa-btn-save').button('reset');
                });
                return false;
            });
        },


        imageUpload: function (image) {
            $.uploadPreview({
                input_field: "#fonasa-image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });
        },

    }
}();