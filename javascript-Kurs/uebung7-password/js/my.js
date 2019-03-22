$('.btn-primary').hide();


// $('#fileinput').change(function() {
//   var file = this.files[0];
//   // This code is only for demo ...
//   console.log("name : " + file.name);
//   console.log("size : " + file.size);
//   console.log("type : " + file.type);
//   console.log("date : " + file.lastModified);
//
//   var x = $(this)[0].labels[0]
//   x.textContent = file.name;
// });

$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

$('#AGBcheck').change(function() {
  if ($(this).val() == "on") {
    $(this).addClass('valide');
    $(this).removeClass('in-valide')
  } else {
    $(this).removeClass('valide');
    $(this).addClass('in-valide')
  }
  testAll();
});

$('#anrede').change(function() {
  if ($(this).val() != "") {
    $(this).addClass('valide');
    $(this).removeClass('in-valide')
  } else {
    $(this).removeClass('valide');
    $(this).addClass('in-valide')
  }
  testAll();
});

$('#gebdate').change(function() {
  if ($(this).val() != "") {
    $(this).addClass('valide');
    $(this).removeClass('in-valide')
  } else {
    $(this).removeClass('valide');
    $(this).addClass('in-valide')
  }
  testAll();
});

$('#email').keyup(function() {

  var input = $(this).val();

  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (re.test(input)) {
    $(this).addClass('valide');
    $(this).removeClass('in-valide')
  } else {
    $(this).removeClass('valide');
    $(this).addClass('in-valide')
  }
  testAll();

});


$('.testName').keyup(function() {
  var input = $(this).val();
  var okCounter = 0;
  var errorCounter = 0;

  if (input.length >= 1) {
    okCounter++;
  }

  if (input.match(/[a-z]/)) {
    okCounter++;
  }

  if (input.match(/[A-Z]/)) {
    okCounter++;
  }
  if (input.match(/\d/)) {
    errorCounter++;
  }

  if (input.match(/[!@#$%\^&*(){}[\]<>?/|\-+]/)) {
    errorCounter++;
  }

  if (okCounter == 3 && errorCounter == 0) {
    $(this).addClass('valide');
    $(this).removeClass('in-valide')
    // $('.btn-primary').show();
  } else {
    $(this).removeClass('valide');
    $(this).addClass('in-valide')
    // $('.btn-primary').hide();
  }
  testAll();

});

$('.kb-password').keyup(function() {
  var input = $(this).val();
  var okCounter = 0;

  if (input.length >= 8) {
    $('#length').addClass('valide');
    okCounter++;
  } else {
    $('#length').removeClass('valide');
  }
  if (input.match(/[A-z]/)) {
    $('#letter').addClass('valide');
    okCounter++;
  } else {
    $('#letter').removeClass('valide');
  }
  if (input.match(/[A-Z]/)) {
    $('#capital').addClass('valide');
    okCounter++;
  } else {
    $('#capital').removeClass('valide');
  }
  if (input.match(/\d/)) {
    $('#number').addClass('valide');
    okCounter++;
  } else {
    $('#number').removeClass('valide');
  }
  if (input.match(/[!@#$%\^&*(){}[\]<>?/|\-+]/)) {
    $('#special').addClass('valide');
    okCounter++;
  } else {
    $('#special').removeClass('valide');
  }

  if (okCounter == 5) {
    $(this).addClass('valide');
    // $('.btn-primary').show();
  } else {
    $(this).removeClass('valide');
    // $('.btn-primary').hide();
  }

  if ($('#exampleInputPassword1').val().length > 0 && $('#exampleInputPassword2').val().length > 0) {
    if ($('#exampleInputPassword1').val() == $('#exampleInputPassword2').val()) {
      $('#pwValInfo').addClass('valide');
      $(this).addClass('valide');
      okCounter++;
    } else {
      $('#pwValInfo').removeClass('valide');
      $(this).removeClass('valide');
    }
  } else {
    okCounter++;
  }

  testAll();
});

function testAll() {
  var okCounter = 0;
  $('.masterForm :input').each(function() {
    console.log($(this).id);
    if ($(this).hasClass('valide')) {
      okCounter++;
      console.log(okCounter);
    }
  });

  if (okCounter == ($('.masterForm :input').length - 1)) {
    $('.btn-primary').show();
  } else {
    $('.btn-primary').hide();
  }
}
