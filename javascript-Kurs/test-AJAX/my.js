$("#ajaxButton").click(function() {
  $.ajax({
    url: "insert.txt",
    success: function(result) {
      $('#d2').html(result);
    }
  });
});
