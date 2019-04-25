var Configuration = function () {

    function imgSort(img, desc, check, title, imgurl) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '" data-title="' + title+ '" data-check="' + check + '" style="background-image: url('+ imgurl +') ">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right slide-delete">x</button>';
        div += '<label class="checkcontent pull-right">';
        div += '<input type="checkbox" class="btn check-slide" checked>';
        div += '<span class="checkmark"></span>';
        div += '</label>';
        if(title !== null || desc !== null){
        div += '<div class="box-text"><h3>'+ (title !== null) ? title : ''  +'</h3>' + (desc !== null) ? desc : '' +'</div>';
        }
        div += '</div>';
        div += '</li>';
        return div;
    }

    function imgSortQuery(img, desc, check, title, imgurl) {
        var div = '<li data-img="' + img + '" data-desc="' + desc + '" data-title="' + title+ '" data-check="' + check + '" style="background-image: url('+ imgurl +') ">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right query-delete">x</button>';
        div += '<label class="checkcontent pull-right">';
        div += '<input type="checkbox" class="btn check-query" checked>';
        div += '<span class="checkmark"></span>';
        div += '</label>';
        if(title !== null || desc !== null){
        div += '<div class="box-text"><h3>'+ (title !== null) ? title : '' +'</h3>' + (desc !== null) ? desc : '' +'</div>';
        }
        div += '</div>';
        div += '</li>';
        return div;
    }

    function addEmail(slug) {
       var li =  '<li class="li-'+ slug +'">';
        li += '<div class="input-group input-group-sm mb-3">'
        li += '<input type="text" class="form-control input-sm" name="'+ slug +'[]" placeholder="" aria-label="" aria-describedby="basic-addon2">'
        li += '<div class="input-group-append">'
        li += '<button class="btn btn-primary delete-email" type="button" data-office="'+ slug +'"><i class="ni ni-fat-delete " style=""></i></button>'
        li += '</div>'
        li += '</div>'
        li += '</li>'
        return li;
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
                        var imgurl = data.data.imgurl;
                        var check = 'active';
                        var title = data.data.title;

                        var div = imgSortQuery(img, desc, check, title, imgurl);
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
                        var imgurl = data.data.imgurl;
                        var check = 'active';
                        var title = data.data.title;

                        var div = imgSort(img, desc, check, title, imgurl);
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
                $("ul.sortable-slide > li").each(function () {
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
            var $form = $('#pages_add');
            $('#pages-btn-save').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("pages_add"));
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
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#pages-btn-save').button('reset');
                });
                return false;
            });
        },

        saveRRSS: function () {
            var $form = $('#rrss_add');
            $('#rrss-btn-save').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("rrss_add"));
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
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#rrss-btn-save').button('reset');
                });
                return false;
            });
        },

        saveAboutUs: function () {
            var $form = $('#aboutus_add');
            $('#aboutus-btn-save').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("aboutus_add"));
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
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#aboutus-btn-save').button('reset');
                });
                return false;
            });
        },

        saveContact: function () {
            var $form = $('#contact_add');
            $('#contact-btn-save').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("contact_add"));
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
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#contact-btn-save').button('reset');
                });
                return false;
            });
        },

        savePopup: function () {
            var $form = $('#popup_add');
            $('#popup-btn-save').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("popup_add"));
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
                        toastr.success(data.message, '!Exitoso!');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#popup-btn-save').button('reset');
                });
                return false;
            });
        },

        editHTMLPopup: function () {
            $('#popup-description').summernote({
                height: 150
            });
        },


        editHTMLAboutus: function () {
            $('#aboutus-description').summernote({
                height: 150
            });
        },

        editHTMLContact: function () {
            $('#contact-description').summernote({
                height: 150
            });
        }, 


        addEmailContact: function () {
            var maxField = 100;
            var addButton = $('.add-email');
            var x = 1;

            $(addButton).click(function () {
                var slug =  $(this).data('office');
                var wrapper = '.ul-' + slug; 
                var input = addEmail(slug);
                if (x < maxField) {
                    x++;
                    $(wrapper).append(input);
                }
            });

            $(document).on('click', '.delete-email', function (e) {
                e.preventDefault();
                var slug =  $(this).data('office');
                var li = '.li-' + slug;
                //var wrapper = '.ul-' + slug; 
                $(this).parents(li).remove();
                x--;
            });
        },

        selectSpecialty: function (datajson) {
            var $specialtySearch = $('#specialty');

            $specialtySearch.select2({
                multiple: true,
                tags: false,
                placeholder: "...",
                maximumSelectionSize: 4,
                minimumInputLength: 3,
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

    }
}();