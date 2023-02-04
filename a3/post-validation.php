<?php

/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking() {
  $errors = []; // new empty array to return multiple error messages
  
  $username = test_input($_POST['user']['name']);
  if ( $username == '') {
    $errors['user']['name'] = "Name can't be blank";
  } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name))  {
    $errors['user']['name'] = "Only letters and white space allowed";
  }

  $email = test_input($_POST['user']['email']);
  if ($email == '') {
    $errors['user']['email'] = "Email can't be blank";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Invalid email format";
  }
  
  $number = test_input($_POST['user']['mobile']);
  if ($number = '') {
    $errors['user']['mobile'] = "Number can't be blank";
  } elseif (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$number)) {
    $errors['user']['mobile'] = "Invalid mobile number format";
  } 

  return $errors; // empty array -> no errors; populated array -> errors.
}








// Returns a blank or alternative string if candidate string is unset / undefined
function unsetFB (&$str, $fallback = '') {
  return ( isset($str) ? $str : $fallback );
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
