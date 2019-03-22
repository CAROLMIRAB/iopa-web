
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item ').click(function () {
                if ($('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').hasClass('show')) {
                    $('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').removeClass('show');
                    $('.nav-item .dropdown-drop').removeClass('show');
                } else {
                    $('.dropdown-menu .dropdown-menu-arrow .dropdown-menu-right').addClass('show');
                    $('.nav-item .dropdown-drop').addClass('show');
                }
            });
        },

        sortableImg: function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        },

        removeImg: function () {
            $('.removeImg').click(function () {
                $('.imgBase64').val('');
                $('.imgurl').val('');
                $('.img-style').css({ 'background': '' });
            });
        },

    }
}();