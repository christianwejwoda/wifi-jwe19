//dies führt was aus wenn das dokument fertig geladen ist
$(document).ready(function() {
  function timeout() {
    window.setTimeout(function() {
      $('button').removeClass('sending');
      $('button').text('gesendet');
      $('button').attr('disabled',false);
    }, 3000)
  }

  $('button').click(function() {

    console.log('Bitte!');

    // $(this).toggleClass('run');
    // $(this).addClass('run');
    // $(this).css({
    //   'width': '300px'
    // });
    // $(this).css({
    //   'width': ($(this).outerWidth() + 50) + 'px'
    // });

    $(this).addClass('sending');
    $(this).text('wird gesendet');
    $(this).attr('disabled', true);
    timeout();
  });

  

});
