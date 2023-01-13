<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>
  </head>

  <body>
  <header> 
      <div id="header-bg"></div>
      <div id="company-name">Lunardo</div> 
    </header>
    
    <nav>
      <div id="logo"><img src="../../media/logo-gold.png"></div>
      <ul id="navbar">
        <li>-</li>
        <li><a href="index.php">BACK</a></li>
        <li>-</li>
      </ul>
    </nav>
    
    <main id="main-booking">
      <section id="booking">  
        <div id="mainbox">
          <div id="movie-trailer"><iframe width="560" height="315" src="https://www.youtube.com/embed/o5F8MOz_IDw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
          <div id="movie-details" >
            <div id="movie-header">
              <div id="movie-title">Avatar: The Way of Water</div>
              <div id="movie-rating">PG-13</div>
            </div>
            <div id="movie-body">
              <div id="movieimg"><img src="../../media/avatar2.jpg" alt="Avatar 2:Way of Water"></div>
              <div id="movie-text">
                <div id="movie-synopsis">Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.</div>
                <hr>
                <div id="movie-director">D: James Cameron</div>
                <hr>
                <div id="movie-stars">C: Sam Worthington, Zoe Saldana, Sugourney Weaver</div>
              </div>
            </div>
          </div>
          
        <div>
      </section>
      <section id ="booking-form">
        <div id ="form-box">
          <form action="/booking.php" method="post" onsubmit="">
            <input type="hidden" name="movie" value="ACT">
            
            <!-- drop down list-->

            <fieldset id="ticket-select">
              <legend>Select your ticket(s)</legend>
              <label for="seat[STA]">Standard Adult</label>
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
            <label for="seat[STP]">Standard Concession</label>
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
            <label for="seat[STC]">Standard Child</label>
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
            <label for="seat[FCA]">First Class Adult</label>
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
            <label for="seat[FCP]">First Class Concession</label>
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
            <label for="seat[FCC]">First Class Child</label>
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
              <legend>Select Day/Session</legend>
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
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Phi Van Bui, s2008156D Group A. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
    </aside>

  </body>
</html>
