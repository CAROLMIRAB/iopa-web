
var Core = function () {

    return {

        dropdown: function () {
            $('.user-click').click(function () {
                if ($('.dropdown-menu-right').hasClass('show')) {
                    $('.dropdown-menu-right').removeClass('show');
                    $('.dropdown-drop').removeClass('show');
                } else {
                    $('.dropdown-menu-right').addClass('show');
                    $('.dropdown-drop').addClass('show');
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