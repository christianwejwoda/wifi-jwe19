var val1 = 0;
var val2 = 0;
var op = 0;

$('input').click(function() {
  switch ($(this).value) {
    case "+":
      op = 1;
      break;
    case "-":
      op = 2;
      break;
    case "*":
      op = 3;
      break;
    case ".":
      break;
    case "=":

      break;
    case "C":
      break;
    default:
      val1 = (val1 * 10) + parseInt(this.value);
      $('textarea').text(val1);
      console.log(this.value);
  }

});

function doCalc() {
  
}
