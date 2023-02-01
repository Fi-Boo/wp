<?php     
  include "tools.php"; 
  include "post-validation.php";
  global $movies;

  headerModule();
?>
    <nav>
      <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
      <ul id="navbar">
        <li><a href="">-</a></li>
        <li><a href="">-</a></li>
        <li><a href="">-</a></li>
      </ul>
    </nav>
    
    <main>
      <section id="movie-data">  
        <div id="bookings-info-grid">
          <div id="movie-detail">
            <div class="movie-title"><?= $movies[$_GET['movie']]["title"] ?></div>
            <div class="movie-runtime"><?= $movies[$_GET['movie']]["runtime"] ?></div>
            <div class="movie-rating"><?= $movies[$_GET['movie']]["rating"] ?></div>
          </div>
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
        </div>
      </section>

      <section id ="booking-form">
        
        <form id="booking-form-grid" action="booking.php?movie=<?= $movies[$_GET['movie']]["code"] ?>" method="post" onsubmit="">
          <input type="hidden" name="movie" value="<?= $movies[$_GET['movie']]["code"] ?>">
            
          <!-- radio buttons for session date selection-->
          <fieldset id="booking-day-select">
            <legend class="section-title"><h2>Select Session</h2></legend>
            <ul id="booking-date">
            <?php sessionSelection($movies[$_GET['movie']]["code"]) ?>
            </ul>
            <div id="session-select-error"></div>
          </fieldset>
          


          <!-- drop down list for ticket selection-->

          <fieldset id="ticket-select">
            <legend class="section-title"><h2>Select your ticket(s)</h2></legend>
            <div id="ticketing-table">
              <table>
                <tr>
                  <th>Seating</th>
                  <th>Price</th>
                  <th>Select</th>
                  <th>Subtotals</th>
                </tr>
                <?php ticketTable(); ?>
                <tr>
                  <th id="tickets-select-error" colspan="2"></th>
                  <th>Total :</th>
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
            <label for="user[name]">Full Name: </label><input type="text" name="user[name]" required><br>
            <label for="user[email]">Email Address: </label><input type="email" name="user[email]" required><br>
            <label for="user[mobile]">Mobile Number (format: 04XXXXXXXX): </label><input type="tel" name="user[mobile]" pattern="04+{8}" required><br>
            <br>
            <input type="submit" value="Submit">
          </fieldset>
            

        </div>
      </section>
    </main>  

    <?php 
    footerModule();
    debugModule(); 
    ?>

  </body>
</html>
