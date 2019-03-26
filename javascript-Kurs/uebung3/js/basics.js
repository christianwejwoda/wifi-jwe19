// let wertDesFeldes = $('input').val();
// let wertDesFeldes = $('input').attr('value');

// let wertDesFeldes = $('p').text();
// let wertDesFeldes = $('p').html();

// let zahl1 =$('.zahl1').val();
// let zahl2 =$('.zahl2').val();
// $('.ergebnis').val(eval(zahl1 + '+' + zahl2));

// let zahl1 = parseInt( $('.zahl1').val());
// let zahl2 = parseInt( $('.zahl2').val());
// $('.ergebnis').val(zahl1 + zahl2);

var equalIsLastButton = true;

$('.insert').click(function() {
  var btnValue = $(this).val();
  var ok = true;

  var lastDotPos = $('.screen').val().lastIndexOf('.');

  var lastActionPos = $('.screen').val().lastIndexOf('+');
  lastActionPos = Math.max($('.screen').val().lastIndexOf('-'), lastActionPos);
  lastActionPos = Math.max($('.screen').val().lastIndexOf('*'), lastActionPos);
  lastActionPos = Math.max($('.screen').val().lastIndexOf('/'), lastActionPos);

  if (btnValue == '.') {

    if (lastDotPos > lastActionPos) {
      ok = false;
    }

    if (lastActionPos == $('.screen').val().length - 1) {
      btnValue = "0" + btnValue;
    }

  }

  if ("+-*/".includes(btnValue)) {
    if (lastDotPos == $('.screen').val().length - 1) {
      delDisplayChar();
    }

    if (lastActionPos == $('.screen').val().length - 1) {
      ok = false;
    }
  }

  if (ok) {
    if (equalIsLastButton) {
      $('.screen').val(
        btnValue
      );
    } else {

      $('.screen').val(
        $('.screen').val() + btnValue
      );
    }
  }

  equalIsLastButton = false;
})

$('.btn-back').click(function() {
  delDisplayChar();
});

function delDisplayChar() {
  var aktuellesErgebnis = $('.screen').val();
  $('.screen').val(aktuellesErgebnis.substr(0, aktuellesErgebnis.length - 1));
}

$('.btn-clean').click(function() {
  $('.screen').val('');
});

$('.btn-equal').click(function() {
  if ($('.screen').val().endsWith('+') ||
    $('.screen').val().endsWith('-') ||
    $('.screen').val().endsWith('*') ||
    $('.screen').val().endsWith('/') ||
    $('.screen').val().endsWith('.')
  ) {
    delDisplayChar();
  }
  $('.screen').val(eval($('.screen').val()));
  equalIsLastButton = true;
});
