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
        },

        selectOffice: function (datajson) {
            var $officeSearch = $('#office');

            $officeSearch.select2({
                multiple: true,
                tags: false,
                placeholder: "...",
                maximumSelectionSize: 6,
                minimumInputLength: 1,
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
                    url: $officeSearch.data('route'),
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

        selectOfficeEdit: function () {
            $("#office").select2({
                tags: false,
                multiple: true,
                tokenSeparators: [',', ' ']
            })
        },
    }
}();