
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

        changeBase64: function () {
            if (this.files && this.files[0]) {
    
                var FR= new FileReader();
                
                FR.addEventListener("load", function(e) {
                  document.getElementById("base64Img").val  = e.target.result;
                }); 
                
                FR.readAsDataURL(this.files[0]);
              }
        }

    }
}();