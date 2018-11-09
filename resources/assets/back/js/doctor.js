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

        imageUploadDoctor: function (route) {
            var canvas = $("#canvas"),
                context = canvas.get(0).getContext("2d"),
                $result = $('#result');


            $('#fileInput').on('change', function () {
                $('#preview-img').hide();
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
                                    aspectRatio: 1/1,
                                    cropBoxResizable: false,
                                    resizable: false,
                                    background: true,
                                    cropBoxResizable: false,
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
                    var imgurl = data.img;
                    console.log(imgurl);
                    $('.cropper-container').hide();
                    $('#imgurl').val(imgurl);
                    $('#preview-img').html('<img src="' + imgurl + '" class="images-preview img-fluid"  >');
                    $('#preview-img').show();
                }).fail(function (data) {
                    var obj = data;
                    $('#btnCrop').button('reset');
                }).always(function () {
                    $('#btnCrop').button('reset');
                });

            });

        },
    }
}();