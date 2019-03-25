
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item ').click(function () {
                if ($('.dropdown-drop').hasClass('show')) {
                    $('.dropdown-drop').removeClass('show');
                    $('.nav-item .dropdown-drop').removeClass('show');
                } else {
                    $('.dropdown-drop').addClass('show');
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