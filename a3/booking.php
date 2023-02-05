<?php   

  include "tools.php"; 
  //include "post-validation.php";
  //global $movies;

  if (!isset($movies[$_GET['movie']]) ) {
    header("Location: index.php"); // redirect if movie code invalid
    exit();
  }
  
  headerModule();


  function unsetFB (&$str, $fallback = '') {
    return ( isset($str) ? $str : $fallback );
  }

  $error = [];
  $movieCode = '';
  $day = '';
  
  
  if (!empty($_POST)) {


    // movie code  validation. Will return user to index if incorrect $POST movie code
    $movieCode = unsetFB($_POST['movie']);

    if ( !isset($movies[$movieCode]) ) {
      header("Location: index.php");
      exit();
    }


    // session code validation. 
    $day = unsetFB($_POST['day']);
    echo $day;
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
    






  }









?>

<script> navScroll('booking'); </script>
<nav>
      <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
      <ul id="navbar">
        <li class="nav-li"><a href="#aboutus"></a></li>
        <li class="nav-li"><a href="#prices"></a></li>
        <li class="nav-li"><a href="#nowshowing"></a></li>
      </ul>
    </nav>
    
    <main>
      <script> 
        testFunction();
      </script>
      <section id="movie-data">  
        <div id="movie-detail">
          <div class="movie-title movie-title-bp"><?= $movies[$_GET['movie']]["title"] ?></div>
          <div class="movie-runtime"><?= $movies[$_GET['movie']]["runtime"] ?></div>
          <div class="movie-rating"><?= $movies[$_GET['movie']]["rating"] ?></div>
        </div>
        <article id="bookings-info-grid">
          <div id="movie-trailer"><iframe src=<?= $movies[$_GET['movie']]["trailer"] ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
          <div id="movieimg"><img src=<?= $movies[$_GET['movie']]["poster"] ?> alt=<?= $movies[$_GET['movie']]["title"] ?>></div>
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
            <form method="post">
              <input type="hidden" name="movie" value="<?= $_GET['movie'] ?>">
            
              <!-- radio buttons for session date selection-->
              <fieldset id="booking-day-select">
                <legend class="section-title"><h2>Select Session</h2></legend>
                <ul id="booking-date">
                <?php sessionSelection($movies[$_GET['movie']]["code"]) ?>
                </ul>
                <div class="error-container"><div id="session-select-error">Please select a Session to view pricing</div></div>
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
                      <th class="error-container" colspan="3"><div id="tickets-select-error"> Mimimum 1 ticket required for booking</div></th>
      
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
                    </table>
                    <div class="error-container">
                      <div id="details-error">Missing or incorrect input. See field <img src="../../media/info-icon.png"> for more info</div>
                    </div>
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
