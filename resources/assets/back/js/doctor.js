var Doctors = function () {

    return {

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
            $('#doctor-form').submit(function (e) {
                $('.btn-save').button('loading');
                e.preventDefault();
                var formData = new FormData(document.getElementById("doctor-form"));
                formData.append("dato", "valor");
                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
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
                        canvas.cropper('destroy');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('.btn-save').button('reset');
                });
                return false;
            });
        },

        editDoctor: function () {
            $('#doctor-form').submit(function (e) {
                $('.btn-save').button('loading');
                e.preventDefault();
                var formData = new FormData(document.getElementById("doctor-form"));
                formData.append("dato", "valor");
                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
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
                        return false;
                    }
                    if (data.status == 200) {
                        toastr.success(data.message, '!Exitoso!');
                        $('#doctor-form')[0].reset();
                        $(".invalid-feedback").html('');
                        canvas.cropper('destroy');
                    }
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                    $('.btn-save').button('reset');
                });
                //return false;
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
                    var obj = data;
                    $('#btnCrop').button('reset');
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
                        data: 'created',
                        width: "120px"
                    },
                    {
                        data: 'route',
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

                    $(".datatable-posts").css("width", "100%");
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },
    }
}();