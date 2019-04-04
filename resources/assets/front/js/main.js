

//SmoothScroll 
jQuery(document).ready(function ($) {
  function scrollToSection(event) {
    event.preventDefault();
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    var $section = $($(this).attr('href'));
    $('html, body').animate({
      scrollTop: $section.offset().top - 130
    }, 500);
  }
  $('.smooth').on('click', scrollToSection);
}(jQuery));



$(document).ready(function () {
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


  $(document).on('click', '.btn-wsp', function () {
    console.log('Chat de Whatsapp');
    //window.location.href = 'app:whatsapp'
  });

  new WOW().init();

});


$(document).ready(function () {

  $(".filter-button").click(function () {

    var value = $(this).attr('data-filter');

    if (value == "all") {
      $('.filter').show('1000');
    }
    else {
      $(".filter").not('.' + value).hide('3000');
      $('.filter').filter('.' + value).show('3000');

    }

    if ($(".filter-button").removeClass("active")) {
      $(this).removeClass("active");
    }

    $(this).addClass("active");

  });

  $('.filter-all').addClass("active");


});

$(document).ready(function () {
  $(document).on('click', '#submit', function () {
    $(this).text('Enviando...');
    $('#sendSuccess').addClass('hide');
    $('.form-loader').removeClass('hide');
    setTimeout(() => {
      $(this).text('Enviar mensaje');
      $('.form-loader').addClass('hide');
      $('#sendSuccess').removeClass('hide');

    }, 2000);
  });

  $('.truncate').succinct({
    size: 60
  });

  //Popup Sistema
  $(document).on('click', '.--open-sys', function () {
    $('#sysPopup').toggleClass('open');
  });

  $(document).on('click', '#sub-reserve', function () {
    $.ajax({
      type: 'post',
      url: $('.sys-popup-content').data('doctor'),
      dataType: "json"
    }).done(function (data) {
      $('.sys-popup-content').html(data);
    }).fail(function (data) {
      
    }).always(function () {
      $('#sub-reserve').button('reset');
    });

  });

})