var Specialties = function () {

    return {

    

        selectSpecialty: function (datajson) {
            var $specialtySearch = $('#specialty');

            $specialtySearch.select2({
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

        selectSpecialtyEdit: function () {
            $("#specialty").select2({
                tags: false,
                multiple: true,
                tokenSeparators: [',', ' ']
            })
        },

       
    }
}();