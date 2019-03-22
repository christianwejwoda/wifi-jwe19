var $lightboxWrapper = $('.lightbox-wrapper');

for (var i = 1; i <= 23; i++) {
  var src = '.jpg';

  src = pad(i.toString(),3) + src;
  var htmlTag = '<img src="img/thumbnails/' + src + '" class="lightbox-image" data-fullscreen="img/fullscreen/' + src + '" alt="">'
  // console.log(htmlTag);

  $lightboxWrapper.append(htmlTag);

}

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

$('.lightbox-image').click(function() {

  //das richtige Bild ermitteln
  var $curClickedImage = $(this);

  // Bild wird hier in einem HTML Markup befindlichen DIV-Container geladen
  var htmlTag = '<img src="' + $curClickedImage.attr('data-fullscreen') + '" class="lightbox-image-big" alt="">'
  // $('.modal-content').empty();
  // $('.modal-content').append(htmlTag);
  $('.modal-content').html(htmlTag);

  // Anschließend wird der DIV-Container (Modal) eingeblendet
  $('#myModal').modal('show');

  //Click Handler dazu um das Modal zu schließen wenn man auf das Bild clickt
  $('.lightbox-image-big').click(function() {
    $('#myModal').modal('hide');
  })
})
