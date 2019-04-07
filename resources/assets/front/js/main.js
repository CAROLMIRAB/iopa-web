

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
    window.location.href = 'app:whatsapp'
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

});

/****************** SISTEMA DE RESERVA ********************/

$(document).on('click', '.--open-sys', function () {
  $('#sysPopup').toggleClass('open');
  $.ajax({
    type: 'post',
    url: $('.sys-popup-content').data('reserve')
  }).done(function (data) {
    $('.reserve-content').html(data);
  }).fail(function (data) {

  }).always(function () {
    $('.--open-sys').button('reset');
  });
});

$(document).on('click', '.link-reserve-doctor', function () {
  $('#sendSuccess').addClass('hide');
  $('.form-loader').removeClass('hide');
  $.ajax({
    type: 'post',
    url: $('.sys-popup-content').data('agenda'),
    data: {
      name: $(this).data('name')
    }
  }).done(function (data) {
    $('.reserve-filter').append('<div class="alert alert-light alert-dismissible show" role="alert">' + data.doctor + ' <button type="button" class="close reserve-filter-doctor" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    $('.reserve-content').html(data.url); 
  }).fail(function (data) {

  }).always(function () {
    $(this).text('Enviar mensaje');
    $('.form-loader').addClass('hide');
    $('#sendSuccess').removeClass('hide');
  });
});


$(document).on('click', '.reserve-filter-rut', function () {
  $('#sendSuccess').addClass('hide');
  $('.form-loader').removeClass('hide');
  $.ajax({
    type: 'post',
    url: $('.sys-popup-content').data('reserve')
  }).done(function (data) {
    $('.reserve-content').html(data);
  }).fail(function (data) {

  }).always(function () {
    $('.--open-sys').button('reset');
    $(this).text('Enviar mensaje');
    $('.form-loader').addClass('hide');
    $('#sendSuccess').removeClass('hide');
  });
});

$(document).on('click', '.reserve-filter-doctor', function () {
  $('#sendSuccess').addClass('hide');
  $('.form-loader').removeClass('hide');
  $.ajax({
    type: 'post',
    url: $('.sys-popup-content').data('doctor')
  }).done(function (data) {
    $('.reserve-content').html(data.url);
  }).fail(function (data) {

  }).always(function () {
    $('.--open-sys').button('reset');
    $(this).text('Enviar mensaje');
    $('.form-loader').addClass('hide');
    $('#sendSuccess').removeClass('hide');
  });
});


$(document).on('click', '#sub-reserve', function () {
  $(this).text('Enviando...');
  $('#sendSuccess').addClass('hide');
  $('.form-loader').removeClass('hide');
  $.ajax({
    type: 'post',
    data: {
      rut: $('#reserve-rut').val()
    },
    url: $('.sys-popup-content').data('doctor')
  }).done(function (data) {
    $('.reserve-filter').append('<div class="alert alert-light alert-dismissible show" role="alert">' + data.rut + ' <button type="button" class="close reserve-filter-rut" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    $('.reserve-content').html(data.url);
  }).fail(function (data) {

  }).always(function () {
    $(this).text('Enviar mensaje');
    $('.form-loader').addClass('hide');
    $('#sendSuccess').removeClass('hide');
  });

});




$(document).on('keyup', '#reserve-buscador', function () {
  var nombres = $('.reserve-names');
  var buscando = $(this).val().toLowerCase();
  var item = '';
  for (var i = 0; i < nombres.length; i++) {
    item = $(nombres[i]).html().toLowerCase();
    for (var x = 0; x < item.length; x++) {
      if (buscando.length == 0 || item.indexOf(buscando) > -1) {
        $(nombres[i]).parents('.reserve-li').show();
      } else {
        $(nombres[i]).parents('.reserve-li').hide();
      }
    }
  }
});

$(document).on('keyup', 'input#reserve-rut', function (event) {
  $(this).rut({ formatOn: 'keyup', ignoreControlKeys: false, useThousandsSeparator: false, minimumLength: 8 });
});
