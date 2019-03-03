
$(document).ready(function(){
    $(function () {
       $('[data-toggle="popover"]').popover()
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('.partners-caousel').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
      });

      $('.phones-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
      });


      $(document).on('click','.btn-wsp', function(){
          console.log('Chat de Whatsapp');
         //window.location.href = 'app:whatsapp'
      });

    new WOW().init();

  });


  $(document).ready(function(){

    $(".filter-button").click(function(){
        
      var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
          $(".filter").not('.'+value).hide('3000');
          $('.filter').filter('.'+value).show('3000');
            
        }

        if ($(".filter-button").removeClass("active")) {
          $(this).removeClass("active");
        }
    
        $(this).addClass("active");

    });
    
    $('.filter-all').addClass("active");

    $('.truncate').succinct({
      size: 60
  });

});