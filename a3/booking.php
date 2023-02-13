<?php   

  include "tools.php"; 


  // if request is post other - this ensures that code is not run the first time user goes to booking as that will be GET request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("post-validation.php");
    $errorsOut = validatePost(); 

    if (empty($errorsOut)) {
      $_SESSION = $_POST;
      //printToFile('bookings.txt',$_POST); 
      //generateBR(6);
      //header("Location: receipt.php?printType=");
    } 
  } 

  validateRequest($_GET['movie']);
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
                      <?php yourDetailsTr(); ?>
                    </table> 
                    
                  </div>
                  <div class="book-tickets-btn">
                    <input type="submit" value="Book Tickets">
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
