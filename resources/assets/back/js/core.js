
var Core = function () {

    function galeryImg(img, id, imgurl) {
        var imgfunc = "'"+imgurl+"'";
        var div = '<li class="box-image-gallery" data-img="' + img + '" data-id="' + id+ '" data-url="' +imgurl+ '" style="background-image: url('+ imgurl +'); background-size: cover;">';
        div += '<div class="box-image nostatus">';
        div += '</div>';
        div += '</li>';
        return div;
    }

    return {

        dropdown: function () {
            $('.user-click').click(function () {
                if ($('.dropdown-menu-right').hasClass('show')) {
                    $('.dropdown-menu-right').removeClass('show');
                    $('.dropdown-drop').removeClass('show');
                } else {
                    $('.dropdown-menu-right').addClass('show');
                    $('.dropdown-drop').addClass('show');
                }
            });
        },

        sortableImg: function () {
            $(".sortable").sortable();
            $(".sortable").disableSelection();
        },

        removeImg: function () {
            $('.removeImg').click(function () {
                $('.imgBase64').val('');
                $('.imgurl').val('');
                $('.img-style').css({ 'background': '' });
            });
        },

        gallery: function(){
            var url = $('#gallery-dropzone').attr('action');
            var base64 = '';
            var myDropzone = new Dropzone("#gallery-dropzone", { 
                 addRemoveLinks: true,
                 paramName: 'file',
        clickable: true,
        parallelUploads: 1,
        uploadMultiple: true,
        autoProcessQueue: false,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.PNG,.JPEG,.JPG",
        accept: function(file, done){
            var reader = new FileReader();
            reader.onload = handleReaderLoad;
            reader.readAsDataURL(file);
            function handleReaderLoad(evt) {
                document.getElementById("id_base64_data")
                    .setAttribute('value', evt.target.result);
                var form = $('#gallery-dropzone');
               
                $.ajax({
                    method: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data){
                        $(file.previewElement).find('.dz-filename').html('<span>'+ data.data.image +'</span>');
                        $(file.previewElement).find(".dz-success-mark").css({"opacity": '0.8'});
                        $(file.previewElement).find('.dz-progress').remove();
                    },
                    
                });
            }
            done();
        },

        uploadprogress: function(file, progress, bytesSent) {
            progress = bytesSent / file.size * 100;
            $(file.previewElement).find('.dz-upload').css({ 'width': progress + "%"});
        },
    
        removedfile: function(file) {
                    var name = file.name; 
       
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {name: name,request: 2},
                        success: function(data){
                        console.log('success: ' + data);
                    }
                     });

                     var _ref;
                     return ((_ref = file.previewElement) != null) ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    success: function(){
            
                     }
                
                });
        },

        imagesGallery: function(){
            var gallery = '';
            $.ajax({
                type: 'post',
                url: $('.images-gallery').data('route'),
                dataType: "json"
            }).done(function (data) {
                if (data.status == 200) {
                    var images = data.data.images;
                    $.each( images, function( key, value ) {
                        var images = galeryImg(value.name, value.id, value.imgurl);
                         gallery += images;
                      });

                      $(document).find('.images-gallery').html(gallery);  
                }
                if (data.status == 400) {
                    toastr.error(data.message, '!Error!');
                }
            }).fail(function (data) {
                toastr.error(data.message, '!Error!');
            }).always(function () {
               
            });

            $(document).on('click', '.tab-select-images-gallery', function(){
                var galleryload = '';
                if($(document).hasClass('.dz-image-preview')){
                    $.ajax({
                        type: 'post',
                        url: $(document).find('.images-gallery').data('route'),
                        dataType: "json"
                    }).done(function (data) {
                        if (data.status == 200) {
                            var images = data.data.images;
                            $.each( images, function( key, value ) {
                                var images = galeryImg(value.name, value.id, value.imgurl);
                                 galleryload += images;
                              });
                              $(document).find('.images-gallery').html(galleryload);  
                        }
                        if (data.status == 400) {
                            toastr.error(data.message, '!Error!');
                        }
                    }).fail(function (data) {
                        toastr.error(data.message, '!Error!');
                    }).always(function () {
                       
                    });
        
                }
            });

            $(document).on('click', '#btn-select-gallery', function(){
                var url = $('.images-gallery').find('.box-image-gallery-focus').data('url');
                var img = $('.images-gallery').find('.box-image-gallery-focus').data('img');
                $(document).find('#image-preview').css({'background-image': 'url(' + url + ')',  'background-size': 'cover', 'background-size': 'cover', 'background-position': 'center center' });
                $(document).find('#imgBase64').val(img);
                $('#modal-gallery').modal('hide');
            });

            $(document).on('click', '.box-image-gallery', function(){
                $('.box-image-gallery').removeClass('box-image-gallery-focus');
                $(this).addClass('box-image-gallery-focus');
            });  
        },

        imagesDataTable: function(){
            var route = $('.datatable-images').data('route');
            var table = $('.datatable-images').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[3, "desc"]],
                columns: [
                    {
                        data: 'imgurl',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = '<a class="avatar avatar-sm"><img src="' + data + '" class="img-fluid rounded"></a>';
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
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button = '';
                            
                            return button;
                        }
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
                    { className: "cdatatable-td", targets: [3] }
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
        }
    }
}();