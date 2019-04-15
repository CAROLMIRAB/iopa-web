var Configuration = function () {

    function imgSort(img, desc, check, title) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '" data-title="' + title+ '" data-check="' + check + '" style="background: url('+ img +') ">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right slide-delete">x</button>';
        div += '<label class="checkcontent pull-right">';
        div += '<input type="checkbox" class="btn check-slide" checked>';
        div += '<span class="checkmark"></span>';
        div += '</label>';
        div += '<div class="box-text"><h3>'+ title +'</h3>' + desc +'</div>';
        div += '</div>';
        div += '</li>';
        return div;
    }

    function imgSortQuery(img, desc, check, title) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '" data-title="' + title+ '" data-check="' + check + '" style="background: url('+ img +') ">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right query-delete">x</button>';
        div += '<label class="checkcontent pull-right">';
        div += '<input type="checkbox" class="btn check-query" checked>';
        div += '<span class="checkmark"></span>';
        div += '</label>';
        div += '<div class="box-text"><h3>'+ title +'</h3>' + desc +'</div>';
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

        imagesUpQuery: function (image) {
            $.uploadPreview({
                input_field: "#query-image",
                preview_box: "#query-image-preview",
                label_field: "#query-image-label",
                label_default: image,
                label_selected: image
            });
        },



        queryAdd: function () {
            var $form = $('#query_add');
            $('#btn-addquery').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("query_add"));
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
                        var check = 'active';
                        var title = data.data.title;

                        var div = imgSortQuery(img, desc, check, title);
                        $('.sortable-query').append(div);
                        $('#modal-addquery').modal('hide');
                        toastr.success(data.message, '!Exitoso!');

                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btn-addquery').button('reset');
                });
                return false;
            });

            $('.sortable-query').on('click', '.query-delete', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
            })

            $('.sortable-query').on('change', '.check-query', function (e) {
                e.preventDefault();
                var check = $(this).is(":checked") ? 'active' : 'inactive';
                $(this).parents('li').data('check', check);
            })
        },


        saveQuery: function () {
            $('#query-btn-save').click(function (e) {
                $(this).button('loading');
                var slug = $('#query-slug').val();
                var mylist = [];
                var i = 1;  
                var check = ($(this).find('.check-query').is(':checked')) == true ? 'active' : 'inactive';
                $("ul.sortable-query > li").each(function () {
                    mylist.push({
                        "id": i,
                        "img": $(this).data('img'),
                        "description": $(this).data('desc'),
                        "title": $(this).data('title'),
                        "active": $(this).data('check'),
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
                    $('#query-btn-save').button('reset');
                });
                return false;
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
                        var check = 'active';
                        var title = data.data.title;

                        var div = imgSort(img, desc, check, title);
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

            $('.sortable-slide').on('change', '.check-slide', function (e) {
                e.preventDefault();
                var check = $(this).is(":checked") ? 'active' : 'inactive';
                $(this).parents('li').data('check', check);
            })
        },


        saveSlide: function () {
            $('#slide-btn-save').click(function (e) {
                $(this).button('loading');
                var slug = $('#slide-slug').val();
                var mylist = [];
                var i = 1;  
                var check = ($(this).find('.check-slide').is(':checked')) == true ? 'active' : 'inactive';
                $("ul#sortable > li").each(function () {
                    mylist.push({
                        "id": i,
                        "img": $(this).data('img'),
                        "description": $(this).data('desc'),
                        "title": $(this).data('title'),
                        "active": $(this).data('check'),
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


        savePagesDescription: function () {
            $('#pages-btn-save').click(function (e) {
                var formData = new FormData(document.getElementById("slide_add"));
                $(this).button('loading');
                var slug = $('#pages-slug').val();
                $.ajax({
                    type: 'post',
                    url: $(this).data('url'),
                    data: formData,
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