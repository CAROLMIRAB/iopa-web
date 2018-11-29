var Offices = function () {

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

        imageUpload: function (image) {
            $.uploadPreview({
                input_field: "#image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });
        }
    }
}();