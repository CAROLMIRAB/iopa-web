var Agreement = function () {

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

    function imgSort(img) {
        var div = '<li data-img="' + img + '">';
        div += '<div class="box-image nostatus">';
        div += '<button type="button" class="btn btn-success btn-sm pull-right conv-delete">x</button>'
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

        addArancel: function(){
                var $form = $('#arancel_add');
                $('#btn-addarancel').click(function () {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("arancel_add"));
                    $.ajax({
                        type: 'post',
                        url: $form.attr('action'),
                        data: formData,
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                           var  title = '',
                                route = '',
                                pdf = '',
                                key = '';
                        if (data.status === 400) {
                            toastr.error(data.message, '!Error!');
                        }
                        if (data.status === 200) {
                            var json = JSON.parse(data.data);
                            $.each(json, function (k, val) {
                                key = k;
                                title = val.title;
                                route = val.route;
                                pdf = val.pdf;
                            });
    
                            var tr = arancelTr( route, pdf, title, key);
                            $('.table-arancel > tbody').append(tr);
                            toastr.success(data.message, '!Exitoso!');
                        }
                    }).fail(function (data) {
                        toastr.error(data.message, '!Error!');
                    }).always(function () {
                        $('#btn-addarancel').button('reset');
                    });
                    return false;
                });

        },

        minTrArancel: function () {
            var wrapper = $('.table-arancel > tbody');
            $(wrapper).on('click', '.min-aran-tr', function (e) {
                e.preventDefault();
                var tr = $(this).parents('tr').index() - 1;
                var slug = $('#arancel-slug').val();
                $(this).parents('tr').remove();
                $.ajax({
                    type: 'post',
                    url: $('#arancel_add').data('route'),
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
                    $('#btn-addarancel').button('reset');
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

        imagesUpCon: function (image) {
            $.uploadPreview({
                input_field: "#convenio-image",
                preview_box: "#convenio-image-preview",
                label_field: "#convenio-image-label",
                label_default: image,
                label_selected: image
            });
        },

        imagesUp: function (image) {
            $.uploadPreview({
                input_field: "#isapre-image",
                preview_box: "#isapre-image-preview",
                label_field: "#isapre-image-label",
                label_default: image,
                label_selected: image
            });
        },

        imagesUpArancel: function (image) {
            $.uploadPreview({
                input_field: "#arancel-image",
                preview_box: "#arancel-image-preview",
                label_field: "#arancel-image-label",
                label_default: image,
                label_selected: image
            });
        },

        imagesUpProm: function (image) {
            $.uploadPreview({
                input_field: "#promo-image",
                preview_box: "#promo-image-preview",
                label_field: "#promo-image-label",
                label_default: image,
                label_selected: image
            });
        },

        isapreAdd: function () {
            var $form = $('#isapre_add');
            $('#btn-addisapre').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("isapre_add"));
                $form.validate({
                    rules: {
                        account_title: {
                            required: true,
                            minlength: 2
                        },
                    },
                    messages: {
                        account_title: {
                            required: "El nombre de la cuenta es un campo requerido",
                            minlength: "Escriba un nombre de cuenta más largo"
                            
                        }
                       
                    },
                });
    
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

        convenioAdd: function () {
            var $form = $('#convenio_add');
            $('#btn-addconvenio').click(function () {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("convenio_add"));
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
                    $('#btn-addconvenio').button('reset');
                });
                return false;
            });

            $('#sortable').on('click', '.conv-delete', function (e) {
                e.preventDefault();
                $(this).parents('li').remove();
            })
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


        saveArancel: function () {
            var $form = $('#arancel');
            $('#arancel-btn-save').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("arancel"));
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
                    $('#arancel-btn-save').button('reset');
                });
                return false;
            });
        },

        saveProm: function () {
            var $form = $('#promo');
            $('#promo-btn-save').click(function (e) {
                $(this).button('loading');
                var formData = new FormData(document.getElementById("promo"));
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
                    $('#promo-btn-save').button('reset');
                });
                return false;
            });
        },

        saveConvenio: function () {
            var $form = $('#convenio');
            $('#convenio-btn-save').click(function (e) {
                $(this).button('loading');
                var title = $('#convenio-title').val();
                var slug = $('#convenio-slug').val();
                var description = $('textarea#convenio-description').val();
                var mylist = [];
                var i = 1;
                $("ul#sortable > li").each(function () {
                    mylist.push({
                        "id": i,
                        "img": $(this).data('img')
                    });
                    i++
                })

                console.log(mylist);
                $.ajax({
                    type: 'post',
                    url: $form.attr('action'),
                    data: {
                        slug: slug,
                        title: title,
                        description: description,
                        list: mylist
                    },
                    dataType: "json"

                }).done(function (data) {
                    toastr.success(data.message, '!Exitoso!');
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#convenio-btn-save').button('reset');
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

        imageUpload: function (image) {
            $.uploadPreview({
                input_field: "#fonasa-image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });
        },

        pagoDropzone: function () {
            Dropzone.options.myAwesomeDropzone = {
                paramName: "image",
                maxFilesize: 30,
                url: 'UploadImages',
                previewsContainer: "#dropzone-previews",
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 30,
                addRemoveLinks: true,
                init: function () {
                    var cd;
                    this.on("success", function (file, response) {
                        $('.dz-progress').hide();
                        $('.dz-size').hide();
                        $('.dz-error-mark').hide();
                        console.log(response);
                        console.log(file);
                        cd = response;
                    });
                    this.on("addedfile", function (file) {
                        var unique_field_id = new Date().getTime();

                        title = file.title == undefined ? "" : file.title;
                        file._titleLabel = Dropzone.createElement("<p>Title:</p>")
                        file._titleBox = Dropzone.createElement("<input id='" + file.name + unique_field_id + "_title' type='text' name='title' value=" + title + " >");
                        file.previewElement.appendChild(file._titleLabel);
                        file.previewElement.appendChild(file._titleBox);

                        description = file.description == undefined ? "" : file.description;
                        file._descriptionLabel = Dropzone.createElement("<p>Description:</p>")
                        file._descriptionBox = Dropzone.createElement("<input id='" + file.name + unique_field_id + "_desc' type='text' name='description' value=" + description + " >");
                        file.previewElement.appendChild(file._descriptionLabel);
                        file.previewElement.appendChild(file._descriptionBox);
                    });
                    this.on("removedfile", function (file) {

                        var rmvFile = "";
                        for (var f = 0; f < fileList.length; f++) {
                            if (fileList[f].fileName == file.name) {
                                rmvFile = fileList[f].serverFileName;
                            }
                        }

                        if (rmvFile) {
                            $.ajax({
                                url: path,
                                type: "POST",
                                data: {
                                    filenamenew: rmvFile,
                                    type: 'delete',
                                },
                            });
                        }
                        /*  var removeButton = Dropzone.createElement("<a href='#'>Remove file</a>");
                          var _this = this;
  
                          if (currentFile) {
                              this.removeFile(currentFile);
                          }
                          currentFile = file;
                          removeButton.addEventListener("click", function (e) {
                              e.preventDefault();
                              e.stopPropagation();
                              _this.removeFile(file);
                              var name = "largeFileName=" + cd.pi.largePicPath + "&smallFileName=" + cd.pi.smallPicPath;
                              $.ajax({
                                  type: 'POST',
                                  url: 'DeleteImage',
                                  data: name,
                                  dataType: 'json'
                              });
                          });
                          file.previewElement.appendChild(removeButton);*/
                    });
                }
            };
        },

        editHTMLFonasa: function () {
            $('#fonasa-description').summernote({
                height: 150
            });
        },

        editHTMLIsapre: function () {
            $('#isapre-description').summernote({
                height: 150
            });
        },

        editHTMLConvenio: function () {
            $('#convenio-description').summernote({
                height: 150
            });
        },

        editHTMLProm: function () {
            $('#promo-description').summernote({
                height: 150
            });
        },

        editHTMLArancel: function () {
            $('#arancel-description').summernote({
                height: 150
            });
        }

    }
}();