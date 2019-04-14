var Configuration = function () {

    function imgSort(img, desc) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '" style="background: url('+ img +') ">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right slide-delete">x</button>';
        div += '<div class="box-text">' + desc +'</div>';
        div += '</div>';
        div += '</li>';
        return div;
    }

    return {
        
        imagesUpSlide: function (image) {
            $.uploadPreview({
                input_field: "#slide-image",
                preview_box: "#slide-image-preview",
                label_field: "#slide-image-label",
                label_default: image,
                label_selected: image
            });
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
                        $('.sortable-slide').append(div);
                        $('#modal-addslide').modal('hide');
                        toastr.success(data.message, '!Exitoso!');

                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addslide').button('reset');
                });
                return false;
            });

            $('.sortable-slide').on('click', '.slide-delete', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
            })
        },


        saveSlide: function () {
            $('#slide-btn-save').click(function (e) {
                $(this).button('loading');
                var slug = $('#slide-slug').val();
                var mylist = [];
                var i = 1;
                $("ul#sortable > li").each(function () {
                    mylist.push({
                        "id": i,
                        "img": $(this).data('img'),
                        "description": $(this).data('desc')
                    });
                    i++
                });
                $.ajax({
                    type: 'post',
                    url: $(this).data('url'),
                    data: {
                        slug: slug,
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