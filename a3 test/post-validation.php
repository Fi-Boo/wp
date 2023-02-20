<?php

function validatePost()
{
  global $movies;
  $errors = [];

  $movieCode = unsetFB($_POST['movie']);
  $day = unsetFB($_POST['day']);
  //$seats = unsetFB($_POST['seats']);
  $username = trim($_POST['user']['name']);
  $email = trim($_POST['user']['email']);
  $number = trim($_POST['user']['mobile']);

  // movie code  validation. Will return user to index if incorrect $POST movie code
  validateRequest($movieCode);

  //echo "passed movieCode";

  // session code validation. 
  // if day is not set, go through the movie array
  // 1. match the current POST movie code
  // 2. find the matching POST day 
  // 3. if the POST day has no session playing or there's no matching POST day then send the user to index.php
  // 4. $dayMatch value returns true if POST day matches an existing day in the Array - Mon-Sun. a false return will send the user back to index.php 
  if (empty($day)) {
    $errors['day'] = "Please choose a session to proceed";
  } else {
    //$error['day'] ="";
    foreach ($movies as $movie => $value) {
      //print_r($movie);
      if ($movieCode == $movie) {
        $dayMatch = false;
        foreach ($value['screenings'] as $weekday => $time) {
          if ($day == $weekday && $time == '-') {
            header("Location: index.php");
            exit();
          }
          if ($day == $weekday) {
            $dayMatch = true;
          }
        }
        if (!$dayMatch) {
          header("Location: index.php");
          exit();
        }
      }
    }
  }



  //echo "passed session select";


  // seat validation. checks each seat type value. If the value is not blank and less than 1 or greater than 10 then user is sent back to index.php
  // *TESTED AND WORKING*
  $count = 0;
  foreach ($_POST['seats'] as $seatType => $quantity) {

    if ($quantity != '' && ($quantity < 1 || $quantity > 10)) {
      //echo 'YOU GOT HACKED';
      header("Location: index.php");
      exit();
    }
    $count += (int) $quantity;
  }

  if ($count == 0) {
    //echo "zero count";
    $errors['seats'] = "Minimum 1 ticket required for booking";
  }

  // username Validation. Cannot be blank. Must be at least 2 western alphabet characters.  
  // *TESTED AND WORKING*

  if ($username === '') {
    //echo "username cant be blank";
    $errors['user']['name'] = "Name can't be blank";
  } elseif (!preg_match("/^[a-zA-Z-' ]{2,}$/", $username)) {
    $errors['user']['name'] = "Only letters and white space allowed";
  }

  // email validation using filter and FILTER_VALIDATE_EMAIL
  if ($email === '') {
    $errors['user']['email'] = "Email can't be blank";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Invalid email format";
  }

  // mobile number validation using regex provided in class
  if ($number === '') {
    $errors['user']['mobile'] = "Number can't be blank";
  } elseif (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $number)) {
    $errors['user']['mobile'] = "Invalid mobile number format";
  }

  return $errors;
}

?>