
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item ').click(function () {
                if ($('.user-log > .dropdown-menu').hasClass('show')) {
                    $('.user-log > .dropdown-menu').removeClass('show');
                    $('.user-log > .nav-item .dropdown').removeClass('show');
                } else {
                    $('.user-log > .dropdown-menu').addClass('show');
                    $('.user-log > .nav-item .dropdown').addClass('show');
                }
            });
        },

        sortableImg: function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        }

    }
}();