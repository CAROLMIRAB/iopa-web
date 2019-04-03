var User = function () {

    return {

    
        allUsers: function () {
            var route = $('.datatable-users').data('route');
            var table = $('.datatable-users').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": route,
                "responsive": true,
                "order": [[4, "desc"]],
                columns: [
                    {
                        data: 'name',
                        width: "100px"
                    },
                    {
                        data: 'email',
                        width: "100px"
                    },
                    {
                        data: 'created',
                        width: "120px"
                    },
                    {
                        data: 'active',
                        width: "80px",
                        render: function (data, type, row, meta) {
                            var button;
                            if (data == 'INACTIVE') {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-size="small">';
                            } else {
                                button = '<input type="checkbox" class="toggle-check" data-id="' + row.id + '" data-toggle="toggle" checked data-on="Activo" data-off="Inactivo"  data-onstyle="info" data-size="small">';
                            }
                            return button;
                        }
                    },
                    {
                        data: 'id',
                        visible: false
                    },

                ],
                columnDefs: [
                    { className: "cdatatable-td", targets: [0] },
                    { className: "cdatatable-td", targets: [1] },
                    { className: "cdatatable-td", targets: [2] },
                    { className: "cdatatable-td", targets: [3] },
                ],
                fnInitComplete: function () {
                    $('.toggle-check').bootstrapToggle();
                    $(".datatable-users").css("width", "100%");
                },
                fnDrawCallback: function() {
                    $('.toggle-check').bootstrapToggle();
                },
                "lengthMenu": [[10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500]]
            });
            table.columns.adjust().draw();
        },

        changeStatus: function () {
            $(document).on('click', '.toggle', function () {
                var $input = $(this).find('input.toggle-check');
                var status = ($input.is(':checked')) ? 'ACTIVE' : 'INACTIVE';
                $.ajax({
                    type: 'post',
                    url: $('.datatable-users').data('route-status'),
                    data: {
                        id: $input.data('id'),
                        status: status
                    }
                }).done(function (data) {
                   
                }).fail(function (data) {
                    toastr.error(data.message, '!Error!');
                }).always(function () {
                   
                });
            });
        },

    }
}();