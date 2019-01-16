var Exams = function () {

    return {

        slug: function () {
            var route = $('#slug').data('route');

            $('#name').focusout(function () {
                var title = $('#name').val();
                var id_exam = $('#id_exam').val();
                    $.ajax({
                        type: 'post',
                        url: route,
                        dataType: "json",
                        data: {
                            title: title,
                            id: id_exam,
                            mod: 'exam'
                        },
                    }).done(function (data) {
                        $('#slug').val(data.data.slug);

                    }).fail(function (data) {

                    }).always(function () {

                    });
                }).change();
           
        },

        editHTML: function () {
            $('#preparation').summernote({
                height: 200
            });
            $('#description').summernote({
                height: 200
            });
            $('#indication').summernote({
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


        allSurgeries: function () {
            var route = $('.datatable-surgeries').data('route');
            var table = $('.datatable-surgeries').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[ 4, "asc" ]],
                columns: [
                    {
                        data: 'name',
                        width: "100px",
                        render: function (data, type, row, meta) {
                            var concat = '<a href="' + row.route + '">' + data + '</a>';
                            return concat;
                        }
                    },
                    {
                        data: 'status',
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button;
                            if (data == "DRAFT") {
                                button = '<span class="badge badge-default">Borrador</span>';
                            } else {
                                button = '<span class="badge badge-success">Publicado</span>';
                            }
                            return button;
                        }
                    },
                    {
                        data: 'created',
                        width: "120px"
                    },
                    {
                        data: 'route',
                        visible: false
                    },
                    {
                        data: 'id',
                        visible: false
                    }

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
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