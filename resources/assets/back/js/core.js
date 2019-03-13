
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item').click(function () {
                if ($('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').hasClass('show')) {
                    $('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').removeClass('show');
                    $(this + '.dropdown').removeClass('show');
                } else {
                    $('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').addClass('show');
                    $(this + '.dropdown').addClass('show');
                }
            });
        },

        sortableImg: function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        }

    }
}();