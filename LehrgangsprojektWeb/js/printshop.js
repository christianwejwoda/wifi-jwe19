// $('.btn-send').hide();


// Validation
// - product
// - favcolor
// - frontpagetext
// - pageoption
// - pagecount
// - paper-weight
// - randloserdruck
// - fileupload
// - liefertermin

$('#btn-send').click(function() {
  var ok = true;
  ok &= check_product();
  ok &= check_frontpageoption();
  ok &= check_pageoption();
  ok &= check_paperweight();
  ok &= check_deliverydate();

  if (ok) {
    $('#printshop_form').submit();
  }

});

// check for product
$('#product').change(function() {
  check_product();
});
function check_product() {
  var answer = $('#product').val() != "";
  if (answer) {
    $('#product_error')[0].textContent="";
  } else {
    $('#product_error')[0].textContent="Produkt fehlt";
  }
  return answer;
};

// check for frontpageoption
$('[name="frontpageoption"]').change(function() {
  check_frontpageoption();
});
function check_frontpageoption() {

  var answer = 0;

  $.each($('[name="frontpageoption"]'), function(key, value) {
    if ($('[name="frontpageoption"]')[key].checked) {
      answer =$('[name="frontpageoption"]')[key].value;
    }
  });
  answer = answer > 0;

  if (answer > 0) {
    $('#frontpageoption_error')[0].textContent="";
  } else {
    $('#frontpageoption_error')[0].textContent="Option für Deckblatt fehlt";
  }

  return answer;
};

// check for pageoption
$('[name="pageoption"]').change(function() {
  check_pageoption();
});
function check_pageoption() {

  var answer = 0;

  $.each($('[name="pageoption"]'), function(key, value) {
    if ($('[name="pageoption"]')[key].checked) {
      answer =$('[name="pageoption"]')[key].value;
    }
  });
  answer = answer > 0;

  if (answer > 0) {
    $('#pageoption_error')[0].textContent="";
  } else {
    $('#pageoption_error')[0].textContent="Option fehlt";
  }

  return answer;
};

// check for paper-weight
$('[name="paper-weight"]').change(function() {
  check_paperweight();
});
function check_paperweight() {

  var answer = 0;

  $.each($('[name="paper-weight"]'), function(key, value) {
    if ($('[name="paper-weight"]')[key].checked) {
      answer =$('[name="paper-weight"]')[key].value;
    }
  });
  answer = answer > 0;

  if (answer > 0) {
    $('#paper-weight_error')[0].textContent="";
  } else {
    $('#paper-weight_error')[0].textContent="Option fehlt";
  }

  return answer;
};

// check for deliverydate
$('#deliverydate').change(function() {
  check_deliverydate();
});
function check_deliverydate() {

  var answer = $('#deliverydate').val() != "";
  if (answer) {
    $('#deliverydate_error')[0].textContent="";
  } else {
    $('#deliverydate_error')[0].textContent="gewünschtes Lieferdatum fehlt";
  }
  return answer;
};
