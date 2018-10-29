var Posts = function () {

    return {

        slug: function () {
            $('#name').slugit({
                event: 'blur'
            });
        },

        editHTML: function () {
            $('#body').summernote({
                height: 200
            });
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

        imageUpload: function () {
            var input = document.querySelector("input[name=image]"),
                img = document.querySelector(".image-preview");

            input.addEventListener("change", function () {
                var file = this.files[0],
                    reader = new FileReader();

                reader.addEventListener("load", function (e) {
                    if (img.style.opacity == 0) {
                        img.src = e.target.result;
                        img.style.opacity = 1;
                    }
                    else {
                        img.style.opacity = 0;
                        setTimeout(function () {
                            img.src = e.target.result;
                            img.style.opacity = 1;
                        }, 2250);
                    }
                }, false);

                reader.readAsDataURL(file);
            }, false);

        },

        imageUpload2: function (image) {
            $.uploadPreview({
                input_field: "#image",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: image,
                label_selected: image
            });

        },

        tagsInput: function () {
            $('input[name="tags"]').amsifySuggestags({
                type: 'amsify',
                suggestions: ['Black', 'White', 'Red', 'Blue', 'Green', 'Orange']
            });
        },

        datePicker: function () {
            var $dateRange = $('#date-range');
            $dateRange.daterangepicker({
                autoApply: true,
                opens: 'left',
                startDate: moment(),
                endtDate: moment(),
                showDropdowns: true,
                showWeekNumbers: true,
                buttonClasses: ['btn btn-sm'],
                applyClass: ' blue',
                cancelClass: 'default',
                format: 'DD/MM/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Aceptar',
                    cancelLabel: 'Cancelar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    customRangeLabel: 'Rango Personalizado',
                    daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    firstDay: 1
                }
            },
                function (start, end) {
                    $('#date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );

            $('#date-range span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#start_date').val(moment().format('YYYY-MM-DD'));
            $('#end_date').val(moment().format('YYYY-MM-DD'));

            $dateRange.on('apply.daterangepicker', function (ev, picker) {
                $('#start_date').val(picker.startDate.format('YYYY-MM-DD'));
                $('#end_date').val(picker.endDate.format('YYYY-MM-DD'));
            });
        }

    }
}();