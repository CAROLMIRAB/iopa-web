var Doctors = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');
            var title_before = $('#name').val();
            $('#name').change(function () {
                var title = $('#name').val();
                var id_post = $('#id_doctor').val();
                $("#btn-save").button('loading');
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        title: title,
                        title_before: title_before,
                        id: id_post,
                        mod: 'doctor'
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

        createDoctor: function () {
            var $form = $('#doctor-form');
            $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        lettersonly: true
                    },
                    lastname: {
                        required: true,
                        minlength: 2,
                        lettersonly: true
                    },
                    phone: {
                        number: true,
                        minlength: 9

                    },
                    rut: {
                        required: true,
                        minlength: 8,
                        maxlength: 10
                    },
                    email: "email",
                    excerpt: "required",
                    imgurl: "required",
                    specialty: "required"
                },
                messages: {
                    name: {
                        required: "El nombre es un campo requerido",
                        minlength: "Escriba un nombre más largo",
                        lettersonly: "Solo se permiten letras"
                    },
                    lastname: {
                        required: "El apellido es un campo requerido",
                        minlength: "Escriba un apellido más largo",
                        lettersonly: "Solo se permiten letras" 
                    },
                    phone: {
                        number: "Ingrese un teléfono válido",
                        minlength: "Ingrese un teléfono válido"
                    },
                    rut: {
                        required: "El rut es un campo requerido",
                        minlength: "No es un rut válido",
                        maxlength: "No es un rut válido",
                    },
                    email: "El email no es válido",
                    excerpt: "El extracto es un campo requerido",
                    imgurl: "No ha agregado una imagen",
                    specialty: "Al menos una especialidad es requerida"
                },
            });

            $('#btn-save').click(function () {
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("doctor-form"));
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
                            $('#doctor-form')[0].reset();
                            $(".invalid-feedback").html('');
                            $("#canvas").cropper('destroy');
                            $('#office').val(null).trigger('change');
                            $('#specialty').val(null).trigger('change');
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
            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
            }, "Letters and spaces only please");

            $('#excerpt').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
            });
        },

        editDoctor: function () {
            var $form = $('#doctor-form');
            $form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        lettersonly: true
                    },
                    lastname: {
                        required: true,
                        minlength: 2,
                        lettersonly: true
                    },
                    phone: {
                        number: true,
                        minlength: 9

                    },
                    rut: {
                        required: true,
                        minlength: 6,
                        maxlength: 9
                    },
                    email: "email",
                    excerpt: "required",
                    imgurl: "required",
                    specialty: "required"
                },
                messages: {
                    name: {
                        required: "El nombre es un campo requerido",
                        minlength: "Escriba un nombre más largo",
                        lettersonly: "Solo se permiten letras"
                    },
                    lastname: {
                        required: "El apellido es un campo requerido",
                        minlength: "Escriba un apellido más largo",
                        lettersonly: "Solo se permiten letras"
                    },
                    phone: {
                        number: "Ingrese un teléfono válido",
                        minlength: "Ingrese un teléfono válido"
                    },
                    rut: {
                        required: "El rut es un campo requerido",
                        minlength: "No es un rut válido",
                        maxlength: "No es un rut válido",
                    },
                    email: "El email no es válido",
                    excerpt: "El extracto es un campo requerido",
                    imgurl: "No ha agregado una imagen",
                    specialty: "Al menos una especialidad es requerida"
                },
            });

            $('#btn-save').click(function () {
                if ($form.valid()) {
                    $(this).button('loading');
                    var formData = new FormData(document.getElementById("doctor-form"));
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
            jQuery.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
            }, "Letters and spaces only please");

            $('#excerpt').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        myElement.val(myElement.summernote('isEmpty') ? "" : contents);
                        v.element(myElement);
                    }
                }
            });
        },

        imageUploadDoctor: function (route) {

            var canvas = $("#canvas"),
                context = canvas.get(0).getContext("2d"),
                $result = $('#result');

            $('#fileInput').on('change', function () {
                if (this.files && this.files[0]) {
                    if (this.files[0].type.match(/^image\//)) {
                        $('#btnCrop').prop('disabled', false);
                        var reader = new FileReader();
                        reader.onload = function (evt) {
                            var img = new Image();
                            img.onload = function () {
                                canvas.cropper('destroy');

                                var MAX_WIDTH = 500;
                                var MAX_HEIGHT = 500;
                                var width = img.width;
                                var height = img.height;

                                context.canvas.height = height;
                                context.canvas.width = width;
                                context.drawImage(img, 0, 0, width, height);
                                var cropper = canvas.cropper({
                                    aspectRatio: 1 / 1,
                                    background: true,
                                    autoCropArea: 1,
                                    viewMode: 1,
                                    width: 500,
                                    height: 500
                                });
                            };
                            img.src = evt.target.result;
                        };
                        reader.readAsDataURL(this.files[0]);
                    }
                    else {
                        alert("Invalid file type! Please select an image file.");
                    }
                }
                else {
                    alert('No file(s) selected.');
                }
            });

            $('#btnCrop').click(function (evento) {
                evento.preventDefault();
                $('.imagen-add').html('');
                $(this).button('loading');
                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
                $.ajax({
                    type: 'post',
                    url: route,
                    dataType: "json",
                    data: {
                        img: croppedImageDataURL,
                    },
                }).done(function (data) {
                    var imgurl = data.data.img_url;
                    $('#imgurl').val(data.data.img_name);
                    $("#avatar-doctor").attr("src", imgurl);
                    $('#modal-notification').modal('hide');
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('#btnCrop').button('reset');
                });

            });

        },

        allDoctors: function () {
            var route = $('.datatable-doctors').data('route');
            var table = $('.datatable-doctors').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[4, "desc"]],
                columns: [
                    {
                        data: 'file',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = '<a class="avatar avatar-sm"><img src="' + data + '" class="rounded-circle "></a>';
                            return concat;
                        }
                    },
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
                        data: 'email',
                        width: "100px"
                    },
                    {
                        data: 'status',
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button;
                            if (data == "INACTIVE") {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-size="small">';
                            } else {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" checked data-on="Activo" data-off="Inactivo"  data-onstyle="info" data-size="small">';
                            }
                            return button;
                        }
                    },
                    {
                        data: 'route',
                        width: "120px",
                        visible: false
                    },
                    {
                        data: 'id',
                        width: "120px",
                        visible: false
                    }

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
                    { className: "cdatatable-td", targets: [4] }
                ],
                fnInitComplete: function () {
                    $('.toggle-check').bootstrapToggle();
                    $(".datatable-doctors").css("width", "100%");
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
                var status = ($input.is(':checked')) ? 'ACTIVE' : 'INACTIVE';
                $.ajax({
                    type: 'post',
                    url: $('.datatable-doctors').data('route-status'),
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