<?php
  include_once('tools.php');
  

  function validatePost() {
    global $movies;
    $errors = [];

    // movie code  validation. Will return user to index if incorrect $POST movie code
    $movieCode = unsetFB($_POST['movie']);
    if (!isset($movies[$movieCode]) ) {
      //echo "error happening HERE";
      header("Location: index.php");
      exit();
    }

    // session code validation. 
    // if day is not set, go through the movie array
    // 1. match the current POST movie code
    // 2. find the matching POST day 
    // 3. if the POST day has no session playing or there's no matching POST day then send the user to index.php
    // 4. $dayMatch value returns true if POST day matches an existing day in the Array - Mon-Sun. a false return will send the user back to index.php 
    $day = unsetFB($_POST['day']);
    if (empty($day)) {
      $errors['day'] = "Please choose a session to proceed";
    } else {
      $error['day'] ="";
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
    }


    // seat validation. checks each seat type value. If the value is not blank and less than 1 or greater than 10 then user is sent back to index.php
    // *TESTED AND WORKING*
    $count = 0;

    foreach ($_POST['seats'] as $seatType => $quantity) {
      $count += (int)$quantity;
      if ($quantity != '' && ($quantity < 1 || $quantity > 10)) {
        //echo 'YOU GOT HACKED';
        header("Location: index.php");
        exit();
      }
    }

    if ($count == 0 ) {
      //echo "zero count";
      $errors['seats'] = "Minimum 1 ticket required for booking";
    } 

    // username Validation. Cannot be blank. Must be at least 2 western alphabet characters.  
    // *TESTED AND WORKING*
    
    global $username;
    if ( $username == '') {
      //echo "username cant be blank";
      $errors['user']['name'] = "Name can't be blank";
    } elseif (!preg_match("/^[a-zA-Z-' ]{2,}$/",$username))  {
      $errors['user']['name'] = "Only letters and white space allowed";
    }

    // email validation using filter and FILTER_VALIDATE_EMAIL
    global $email;
    if ($email == '') {
      $errors['user']['email'] = "Email can't be blank";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['user']['email'] = "Invalid email format";
    }
    
    // mobile number validation using regex provided in class
    global $number;
    if ($number == '') {
      $errors['user']['mobile'] = "Number can't be blank";
    } elseif (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$number)) {
      $errors['user']['mobile'] = "Invalid mobile number format";
    } 

    return $errors;
  }



?>