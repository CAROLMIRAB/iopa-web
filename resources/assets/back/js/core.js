
var Core = function () {

    return {

        dropdown: function () {
            $('.user-log > .nav-item ').click(function () {
                if ($('.nav-link .pr-0').hasClass('show')) {
                    $('.nav-link .pr-0').removeClass('show');
                    $('.nav-item .dropdown-drop').removeClass('show');
                } else {
                    $('.nav-link .pr-0').addClass('show');
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