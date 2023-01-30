<?php     
  include "tools.php"; 
  include "post-validation.php";
  global $movies;
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Cinema Home Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>
    <script src='script.js'></script>
  </head>

  <body>
    <header>
      <div id="header-bg"></div>
      <div id="company-name">Lunardo</div>
    </header>
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
          <div id="movie-trailer"><iframe width="560" height="315" src=<?= $movies[$_GET['movie']]["trailer"] ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
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
        <div id ="form-box">
          <form action="booking.php?movie=ACT" method="post" onsubmit="">
            <input type="hidden" name="movie" value="ACT">
            
            <!-- drop down list-->

            <fieldset id="ticket-select">
              <legend>Select your ticket(s)</legend>
              <label for="seats[STA]">Standard Adult</label>
            <select name="seats[STA]" data-fullprice="21.5" data-discprice="16"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            <label for="seats[STP]">Standard Concession</label>
            <select name="seats[STP]" data-fullprice="19" data-discprice="14.5"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            <label for="seats[STC]">Standard Child</label>
            <select name="seats[STC]" data-fullprice="17.5" data-discprice="13"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            <label for="seats[FCA]">First Class Adult</label>
            <select name="seats[FCA]" data-fullprice="31.5" data-discprice="25"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            <label for="seats[FCP]">First Class Concession</label>
            <select name="seats[FCP]" data-fullprice="28" data-discprice="23.5"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            <label for="seats[FCC]">First Class Child</label>
            <select name="seats[FCC]" data-fullprice="25" data-discprice="22"> 
              <option value="">please select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select><br>
            
            </fieldset>
            

            <!-- radio buttons-->
            <fieldset id="booking-day-select">
              <legend>Select Session</legend>
              <ul id="booking-date">
                <li>
                  <input type="radio" name="day" value="MON" data-pricing="discprice" required><label> Monday 9PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="TUE" data-pricing="fullprice" required><label> Tuesday 9PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="WED" data-pricing="fullprice" required><label> Wednesday 9PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="THU" data-pricing="fullprice" required><label> Thursday 9PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="FRI" data-pricing="fullprice" required><label> Friday 9PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="SAT" data-pricing="fullprice" required><label> Saturday 6PM</label> 
                </li>
                <li>
                  <input type="radio" name="day" value="SUN" data-pricing="fullprice" required><label> Sunday 6PM</label> 
                </li>
              </ul>
            </fieldset>

            <!-- required userdata-->
            <fieldset id="your-details">
              <legend> Your Details </legend>
              <label for="user[name]">Full Name: </label><input type="text" name="user[name]" required><br>
              <label for="user[email]">Email Address: </label><input type="email" name="user[email]" required><br>
              <label for="user[mobile]">Mobile Number (format: 04XXXXXXXX): </label><input type="tel" name="user[mobile]" pattern="04+{8}" required><br>
              <br>
              <input type="submit" value="Submit">
            </fieldset>

        </div>
      </section>
    </main>  

    <footer>
      <div>&copy;<script>document.write(new Date().getFullYear());</script> 
      Phi Van Bui, s2008156D Group A. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <?php debugModule() ?>

  </body>
</html>
