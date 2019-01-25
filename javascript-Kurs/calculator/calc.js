var val1 = 0;
var val2 = 0;
var op = 1;

$('input').click(function() {
  switch (this.value) {
    case "+":
      doCalc()
      $('#display').val(this.value);
      op = 1;
      break;

    case "-":
      doCalc()
      $('#display').val(this.value);
      op = 2;
      break;

    case "*":
      doCalc()
      $('#display').val(this.value);
      op = 3;
      break;

    case "/":
      doCalc()
      $('#display').val(this.value);
      op = 4;
      break;

    case "=":
      doCalc()
      $('#display').val(val2);
      op = 0;
      break;

    case "C":
      val1 = 0;
      val2 = 0,
        op = 1;
      $('#display').val('');
      break;

    case "del":
      $('#display').val($('#display').val().substr(0, $('#display').val().length - 1))
      break;

    case ".":
      if ($('#display').val().includes('.')) {} else {
        $('#display').val($('#display').val() + this.value);
      }
      break;

    default:
      if (op == 0) {
        $('#display').val('');
        op = 1;
        val2 = 0;
      }
      if (val1 == 0) {
        $('#display').val('');
      }
      $('#display').val($('#display').val() + this.value);
      val1 = parseFloat($('#display').val());
  }

});

function doCalc() {
  switch (op) {
    case 1:
      val2 = val2 + val1;
      val1 = 0;
      break;

    case 2:
      val2 = val2 - val1;
      val1 = 0;
      break;

    case 3:
      val2 = val2 * val1;
      val1 = 0;
      break;

    case 4:
      val2 = val2 / val1;
      val1 = 0;
      break;

    default:

  }

}
