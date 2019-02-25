
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item ').click(function () {
                if ($('.dropdown-menu').hasClass('show')) {
                    $('.dropdown-menu').removeClass('show');
                    $('.nav-item .dropdown').removeClass('show');
                } else {
                    $('.dropdown-menu').addClass('show');
                    $('.nav-item .dropdown').addClass('show');
                }
            });
        },

        sortableImg: function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        }

    }
}();