var Configuration = function () {

    function tableTrFon(title, description, key) {
        var tr = '<tr>';
        tr += '<td width="20%">';
        tr += title;
        tr += '</td>';
        tr += ' <td width="75%" style="white-space: normal">';
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
        tr += '<td width="30%" style="white-space: normal">'
        tr += '<ul class="is-ges">'
        tr += ges
        tr += '</ul>'
        tr += ' </td>'
        tr += '<td width="30%" style="white-space: normal">'
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

    function imgSort(img, desc) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right img-delete">x</button>'
        div += '<img src="' + img + '" width="100%">';
        div += '</div>';
        div += '</li>';
        return div;
    }

    function arancelTr(route, name, title, ky) {
        var tr = '<tr>';
        tr += '<td>';
        tr += ' <a href="' + route + '">' + name + '</a>';
        tr += '</td>';
        tr += '<td>';
        tr += title;
        tr += '</td>';
        tr += '<td>';
        tr += '<button class="btn btn-primary min-aran-tr btn-sm" data-key="' + ky + '"><i class="ni ni-fat-delete" style="font-size: 18px"></i> </button>'
        tr += '</td>';
        tr += '</tr>';
        return tr;
    }

    return {
        
        imagesUpCon: function (image) {
            $.uploadPreview({
                input_field: "#slides-image",
                preview_box: "#slides-image-preview",
                label_field: "#slides-image-label",
                label_default: image,
                label_selected: image
            });
        },

        slidesAdd: function () {
            var $form = $('#slides_add');
            $('#btn-addslides').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("slides_add"));
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (data) {

                    if (data.status === 400) {
                        toastr.error(data.message, '!Error!');
                    }
                    if (data.status === 200) {

                        var img = data.data;

                        var div = imgSort(img);
                        $('#sortable').append(div);
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addslides').button('reset');
                });
                return false;
            });

            $('#sortable').on('click', '.conv-delete', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
            })
        },

    

        slideAdd: function () {
            var $form = $('#slide_add');
            $('#btn-addslide').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("slide_add"));
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (data) {

                    if (data.status === 400) {
                        toastr.error(data.message, '!Error!');
                    }
                    if (data.status === 200) {

                        var img = data.data.image;
                        var desc = data.data.description;
                        
                        var div = imgSort(img, desc);
                        $('#sortable').append(div);
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addslide').button('reset');
                });
                return false;
            });

            $('#sortable').on('click', '.conv-delete', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
            })
        },


        saveSlide: function () {
            var $form = $('#slide');
            $('#slide-btn-save').click(function (e) {
                $(this).button('loading');
                var slug = $('#slide-slug').val();
                var description = $('textarea#slide-description').val();
                var mylist = [];
                var i = 1;
                $("ul#sortable > li").each(function () {
                    mylist.push({
                        "id": i,
                        "img": $(this).data('img')
                    });
                    i++
                });
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: {
                        slug: slug,
                        description: description,
                        list: mylist
                    },
                    dataType: "json"

                }).done(function (data) {
                    toastr.success(data.message, '!Exitoso!');
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#slide-btn-save').button('reset');
                });
                return false;
            });
        },


        showAgreements: function () {
            $.ajax({
                type: 'post',
                url: $('.agreements-content').data('route'),
                dataType: "json"
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
                toastr.success(data.message, '!Exitoso!');
            }).fail(function (data) {
                toastr.error(data.message, '!Error!');
            });
            return false;
        },

        editHTMLAboutus: function () {
            $('#aboutus-description').summernote({
                height: 150
            });
        }

    }
}();