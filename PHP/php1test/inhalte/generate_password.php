<?php

function generate_password($length = 8) {
  $allowed_chars_lower = 'abcdefghijklmnopqrstuvwxyzäöüß';
  $allowed_chars_upper = 'ABCDEFGHIJKLMNIOPQRSTUVWXYZ';
  $allowed_chars_numbers = '1234567890';
  $allowed_chars_special = '!§$%&/()=?+-*äöüßÄÖÜ';

  do {
    $password = "";
  for ($i=0; $i < $length ; $i++) {
    switch (rand (1, 4)) {
      case 1:
        $password .= mb_substr($allowed_chars_lower, rand ( 0 , mb_strlen($allowed_chars_lower) ),1);
        break;

      case 2:
        $password .= mb_substr($allowed_chars_upper, rand ( 0 , mb_strlen($allowed_chars_upper) ),1);
        break;

      case 3:
        $password .= mb_substr($allowed_chars_numbers, rand ( 0 , mb_strlen($allowed_chars_numbers) ),1);
        break;

      case 4:
        $password .= mb_substr($allowed_chars_special, rand ( 0 , mb_strlen($allowed_chars_special) ),1);
        break;

    }
  }
} while (!test_password($password,$length));

  return $password;
};

function test_password($password, $length) {
  $answer = true;

  if (mb_strlen($password) != $length) {
    $answer = false;
  }

  if (!preg_match("/[a-z]/",$password)) {
    $answer = false;
  }
  if (!preg_match("/[A-Z]/",$password)) {
    $answer = false;
  }
  if (!preg_match("/[0-9]/",$password)) {
    $answer = false;
  }
  if (!preg_match("/[!§$%&\/()=?+\-*]/",$password)) {
    $answer = false;
  }
  return $answer;
}
 ?>
