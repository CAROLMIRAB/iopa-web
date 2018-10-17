var Posts = function () {

    return {

        storePost: function () {
            var route = $("#post").data('route');
            var inputFileImage = document.getElementById("image");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('archivo', file);

            //console.log($("#post").serialize() + "&" + $("#post-img").serialize());

            $("#btn-save").click(function () {
                console.log($("#post").serialize() + "&" + $("#post-img").serialize()+"&"+ data);

                $.ajax({
                    url: route,
                    type: 'post',
                    data: $("#post").serialize() + "&" + $("#post-img").serialize(),
                    dataType: 'json'


                }).done(function (json) {
                    console.log(json);

                }).fail(function (json) {
                    //Core.swalError(json.responseJSON);
                });

            })
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