<?php
  include_once('tools.php');
  global $movies;

/* Call this function in the booking page like so:
   $postErrors = validateBooking();
   If the array is empty, then no errors were generated
*/

  $errors = []; // new empty array to return multiple error messages
  $movieCode = '';
  $day = '';
  $seats = [];
  $username = '';
  $email = '';
  $number = '';

function validateBooking() {
  global $errors;
  global $movieCode;
  global $day;
  global $seats;
  global $username;
  global $email;
  global $number;

  if (!empty($_POST)) {


    // movie code  validation. Will return user to index if incorrect $POST movie code
    $movieCode = unsetFB($_POST['movie']);

    if ( !isset($movies[$movieCode]) ) {
      // header("Location: index.php");
      // exit();
      echo "something wrong !";
    }


    // session code validation. 
    $day = unsetFB($_POST['day']);

    // if day is not set, go through the movie array
    // 1. match the current POST movie code
    // 2. find the matching POST day 
    // 3. if the POST day has no session playing or there's no matching POST day then send the user to index.php
    // 4. $dayMatch value returns true if POST day matches an existing day in the Array - Mon-Sun. a false return will send the user back to index.php 
    if (!empty($day)) {
      foreach ($movies as $movie) {
        if ($movieCode == $movie['code']) {
          $dayMatch = false;
          foreach ($movie['screenings'] as $weekday => $time) {
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
    } else {
      $error['day'] = "Please choose a session";
    }


    // seat validation. checks each seat type value. If the value is not blank and less than 1 or greater than 10 then user is sent back to index.php

    $seats = unsetFB($_POST['seats']);
    
    if (empty($seats)) {
      $error['seats'] = "No tickets selected yet";
    } else {
      foreach ($_POST['seats'] as $seatType => $purchaseNumber) {
        $purchaseNumber = unsetFB($purchaseNumber);
        //echo $seatType. ': '. $purchaseNumber. '  ';
        if ($purchaseNumber != '' && ($purchaseNumber < 1 || $purchaseNumber > 10)) {
          //echo 'YOU GOT HACKED';
          header("Location: index.php");
          exit();
        }
      }
    }

    // username Validation. Cannot be blank. Must be at least 2 western alphabet characters

    $username = trim($_POST['user']['name']);
    if ( $username == '') {
      $errors['user']['name'] = "Name can't be blank";
    } elseif (!preg_match("/^[a-zA-Z-' ]{2,}$/",$name))  {
      $errors['user']['name'] = "Only letters and white space allowed";
    }

    // email validation using filter and FILTER_VALIDATE_EMAIL

    $email = trim($_POST['user']['email']);
    if ($email == '') {
      $errors['user']['email'] = "Email can't be blank";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['user']['email'] = "Invalid email format";
    }
    
    // mobile number validation using regex provided in class

    $number = trim($_POST['user']['mobile']);
    if ($number = '') {
      $errors['user']['mobile'] = "Number can't be blank";
    } elseif (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$number)) {
      $errors['user']['mobile'] = "Invalid mobile number format";
    } 
  }

  return $errors; // empty array -> no errors; populated array -> errors.
}








// Returns a blank or alternative string if candidate string is unset / undefined
function unsetFB (&$str, $fallback = '') {
  return ( isset($str) ? $str : $fallback );
}


// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

?>
