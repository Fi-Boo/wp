<?php   

  include "tools.php"; 
  //include "post-validation.php";



  // if (!isset($movies[$_GET['movie']]) ) {
  //   header("Location: index.php"); // redirect if movie code invalid
  //   exit();
  // }
  
  headerModule();

  //$postErrors = validateBooking();


  

  
  // $movieCode = '';
  // $day = '';
  // $seats = [];
  // $username = '';
  // $email = '';
  // $number = '';
  
  /*----------- THIS BLOCK IS DOING MY HEAD IN --------------*/

  //if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST)) {
    //echo "why am i here? POST SHOULD BE EMPTY";
    
    
    
    
    
    
    $errorsOut = validatePost(); 
    if (count($errorsOut) > 0) {
      $errorsOut['day'] = ' <span style="color:red">'.unsetFB($errorsOut['day']).'</span>';
      $errorsOut['seats'] = ' <span style="color:red">'.unsetFB($errorsOut['seats']).'</span>';
      $errorsOut['user']['name'] = ' <span style="color:red">'.unsetFB($errorsOut['user']['name']).'</span>';
      $errorsOut['user']['email'] = ' <span style="color:red">'.unsetFB($errorsOut['user']['email']).'</span>';
      $errorsOut['user']['mobile'] = ' <span style="color:red">'.unsetFB($errorsOut['user']['mobile']).'</span>';
    }
  }



  function ticketCount() {
    $count = 0;
    
    return $count;
  }


  /* ----------------------------------------------------- */

  function validatePost() {
    global $movies;
    $errors = [];

    // movie code  validation. Will return user to index if incorrect $POST movie code
    $movieCode = unsetFB($_POST['movie']);
    if (!isset($movies[$movieCode]) ) {
      echo "error happening HERE";
      //header("Location: index.php");
      //exit();
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
        echo 'YOU GOT HACKED';
        header("Location: index.php");
        exit();
      }
    }

    if ($count == 0 ) {
      //echo "zero count";
      $errors['seats'] = "Minimum 1 ticket required for booking";
    } elseif ($count >= 1 || $count <=10 ) {
      //echo "1-10 tickets";
      $errors['seats'] = "";
    }
    
      
    // username Validation. Cannot be blank. Must be at least 2 western alphabet characters.  
    // *TESTED AND WORKING*
    $username = trim($_POST['user']['name']);
    if ( $username == '') {
      //echo "username cant be blank";
      $errors['user']['name'] = "Name can't be blank";
    } elseif (!preg_match("/^[a-zA-Z-' ]{2,}$/",$username))  {
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
    if ($number == '') {
      $errors['user']['mobile'] = "Number can't be blank";
    } elseif (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$number)) {
      $errors['user']['mobile'] = "Invalid mobile number format";
    } 

    return $errors;
  }



?>

<script> 
  navScroll('booking'); 
  
</script>
<nav>
      <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
      <ul id="navbar">
        <li class="nav-li"><a href="#aboutus"></a></li>
        <li class="nav-li"><a href="#prices"></a></li>
        <li class="nav-li"><a href="#nowshowing"></a></li>
      </ul>
    </nav>
    
    <main>
      <section id="movie-data">  
        <div id="movie-detail">
          <div class="movie-title movie-title-bp"><?= $movies[$_GET['movie']]["title"] ?></div>
          <div class="movie-runtime"><?= $movies[$_GET['movie']]["runtime"] ?></div>
          <div class="movie-rating"><?= $movies[$_GET['movie']]["rating"] ?></div>
        </div>
        <article id="bookings-info-grid">
          <div id="movie-trailer"><iframe src = <?= $movies[$_GET['movie']]["trailer"] ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
          <div id="movieimg"><img src = <?= $movies[$_GET['movie']]["poster"] ?> alt = <?= $movies[$_GET['movie']]["title"] ?>></div>
          <div id="movie-synopsis"><?= $movies[$_GET['movie']]["synopsis"] ?></div>
          <div id="movie-team">
            <hr>
            <div id="movie-director"><strong>Director: - </strong><?= $movies[$_GET['movie']]["director"] ?></div>
            <hr>
            <div id="movie-stars"><strong>Cast: - </strong>             
            <?php 
            foreach ( $movies[ $_GET['movie'] ]['actors'] as $actor) {
              echo "$actor - ";
            }
            ?>
            </div>
          </div>
          <div id ="booking-form">
            
            <!-- <form action="booking.php?movie=    ?= $movies[$_GET['movie']]["code"] ?>" method="post" onsubmit="return validateForm()" > -->
            <!-- <form method="post" action="  ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?movie=  ?= $_GET['movie'] ?>" onsubmit='generateTotals()'> -->
              <form method='post'>
              <input type="hidden" name="movie" value="<?= $_GET['movie']?>">
            
              <!-- radio buttons for session date selection-->
              <fieldset id="booking-day-select">
                <legend class="section-title"><h2>Select Session</h2></legend>
                <ul id="booking-date">
                <?php sessionSelection($movies[$_GET['movie']]["code"]) ?>
                </ul>
                <div class="error-container"><div id="session-select-error"><?= unsetFB($errorsOut['day']); ?></div></div>
              </fieldset>
          
              <!-- drop down list for ticket selection-->
              <fieldset id="ticket-select">
                <legend class="section-title"><h2>Select your tickets</h2></legend>
                <div>
                  <table id="ticketing-table">
                    <tr>
                      <th>Seating</th>
                      <th>Price</th>
                      <th>Select</th>
                      <th>Subtotals</th>
                    </tr>
                    <?php ticketTable(); ?>
                    <tr>
                      <th class="error-container" colspan="3"><div id="tickets-select-error"> <?= unsetFB($errorsOut['seats']); ?></div></th>
      
                      <th id="booking-price-total"></th> 
                    </tr>  
                </table>
                </div>
                <div id="ticket-total"> 
                </div>
              </fieldset>
      
              <!-- required userdata-->
              <fieldset id="your-details">
                <legend class="section-title"><h2>Your Details</h2></legend>
                <div id ="details-grid">
                  <div>
                    
                    <table id="details-table">
                    <?php yourDetailsTr() ?>
                    
                      <div id="details-error-name"> <?= unsetFB($errorsOut['user']['name']); ?> </div>
                      <div id="details-error-email"> <?= unsetFB($errorsOut['user']['email']); ?> </div>
                      <div id="details-error-mobile"> <?= unsetFB($errorsOut['user']['mobile']); ?> </div> 
                    </table> 
                  </div>
                  <div id="book-tickets-btn">
                    <input type="submit" value="Book Tickets " >
                  </div>
                  
                </div>
              </fieldset>
            </form>
          </div>  
        </article>
      </section>
    </main>  

    <?php 
    footerModule();
    debugModule(); 
    ?>

  </body>
</html>
