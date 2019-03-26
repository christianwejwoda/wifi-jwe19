$('.btn-ausblenden').click(function() {
  $('.block-red').hide();
});

$('.btn-einblenden').click(function() {
  $('.block-red').show();
});

$('.btn-ausblenden-fade').click(function() {
  $(".block-red").fadeOut('slow', function() {
    $(".block-red").hide();
  });
});

$('.btn-einblenden-fade').click(function() {
  $(".block-red").fadeIn('slow', function() {
    $(".block-red").show();
  });
});

$('.btn-hereinschieben').click(function() {
  $(".block-red").show();
  $(".block-red").slideUp(500);
});

$('.btn-opacity').click(function() {
  $(".block-red").fadeTo(500, 0.5);
});

$('.btn-animate').click(function() {
  // $('.block-red').animate({height: "600px"});
  // $('.block-red').animate({transform: "translate(80px, 50px)"});
  // $('.block-red').addClass('move');
  $('.block-red').css({animation: "mymove 5s linear forwards "});
  // infinite

});
