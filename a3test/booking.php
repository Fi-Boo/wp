<?php   

  include "tools.php"; 




  // if request is post other - this ensures that code is not run the first time user goes to booking as that will be GET request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("post-validation.php");
    $errorMsgs = findBookingErrors();
    

    if (empty($errorMsgs)) {
      $_SESSION = $_POST;

      // print to txt file.
      printToRecords($_POST);
      
      header("Location: receipt.php");
    } 

  }


  // validates initial GET request

  validateRequest($_GET['movie']);

  if (!isset($movies[$_GET['movie']]) ) {
    header("Location: error.php"); // redirect if movie code invalid
    exit();
  }
  

  /* --------- Validation -------------*/

  $currentPost
  $outputStr

  $movieCode = unsetFB($_POST['movie']);
  $day = unsetFB($_POST['day']);




  // 1. validating POST movie code
  validateRequest($_POST[$movieCode]);


  // 2. validating POST day





  /*---- 
  1. function to getMovieByCode() to validate $_POST['movie']
  if invalid - boot to index

  else update $outputStr

  2. function to validate $_POST['day']
  compare to $currentPost['day']
  if $time = '-' or != any day/time combo - boot to index (perhaps boolean return for this)

  else update $outputStr

  3. function to validate $_POST['seats']
  foreach loop to validate each seat value - boot to index if invalid
      
  else update $outputStr
      
  4. functions to validate $_POST['user] with regex patterns 
  
  


-----------------------------------------------------*/


  // this function can be used for either get or post via parameter
  function validateRequest($requestTypeValue) {
    if (!isset($movies[$requestTypeValue]) ) {  //if parameter does not exist in movies array
      header("Location: error.php");  // send user to error.php
      exit();
    }
  }









//   --------- Tools ---------------


// supporting functions

// updateRecordStr($_POST[])
























  headerModule();

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
            
              <form method='post'>
              <!-- <form method='post' novalidate> -->
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

                      <tr id="details-tr-name">
                        <th><div class="details-info" id="details-name"><img src="../../media/info-icon.png" onmouseover="showDetailsInfo('name')" onmouseout="hideDetailsInfo('name')" ><label for="user[name]">Full Name:</label></div></th>
                        <td>
                          <input type="text" name="user[name]" value='<?= unsetFB($username) ?>' placeholder='John Smith' onclick="removeDetailsError('name')" pattern="[a-zA-Z-' ]{2,}" required>
                          <div id="details-error-name"> <?= unsetFB($errorsOut['user']['name']); ?> </div>
                        </td>
                      </tr>

                      <tr id="details-tr-email">
                        <th><div class="details-info" id="details-email"><img src="../../media/info-icon.png" onmouseover="showDetailsInfo('email')" onmouseout="hideDetailsInfo('email')"><label for="user[email]">Email:</label></div></th>
                        <td>
                          <input type="text" name="user[email]" value='<?= unsetFB($email) ?>' placeholder='JohnS@gmail.com' onclick="removeDetailsError('email')" pattern = "[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                          <div id="details-error-email"> <?= unsetFB($errorsOut['user']['email']); ?> </div>
                        </td>
                      </tr>

                      <tr id="details-tr-mobile">
                        <th><div class="details-info" id="details-mobile"><img src="../../media/info-icon.png" onmouseover="showDetailsInfo('mobile')" onmouseout="hideDetailsInfo('mobile')"><label for="user[mobile]">Number:</label></div></th>
                        <td>
                          <input type="text" name="user[mobile]" value='<?= unsetFB($number) ?>' placeholder='04XX XXX XXX' onclick="removeDetailsError('mobile')" pattern = "(\(04\)|04|\+614)( ?\d){8}" required>
                          <div id="details-error-mobile"> <?= unsetFB($errorsOut['user']['mobile']); ?> </div>
                        </td>  
                      </tr>  

                    </table> 
                    
                  </div>
                  <div class="book-tickets-btn">
                    <input type="submit" value="Book Tickets " >
                    <!-- <input type="submit" value="Book Tickets " formnovalidate> -->
                  </div>
                  
                </div>
              </fieldset>
            </form>
          </div>  
        </article>
      </section>
    </main>  
    <script>
      calculateSubTotals();
    </script>
    <?php 
    footerModule();
    debugModule(); 
    ?>

  </body>
</html>
