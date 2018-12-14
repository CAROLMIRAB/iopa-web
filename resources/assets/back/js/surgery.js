var Surgery = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');

            $('#name').focusout(function () {
                var title = $('#name').val();
               
                    $.ajax({
                        type: 'post',
                        url: route,
                        dataType: "json",
                        data: {
                            title: title
                        },
                    }).done(function (data) {
                        $('#slug').val(data.data.slug);

                    }).fail(function (data) {

                    }).always(function () {

                    });
                }).change();
           
        },

        editHTML: function () {
            $('#body').summernote({
                height: 200
            });
        },

        imageUpload: function (image) {
            $.uploadPreview({
                input_field: "#image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });

        },

    }
}();