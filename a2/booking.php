<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Bungee&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src='../wireframe.js'></script>
  </head>

  <body>
  <header> 
      <div id="header-box">
      <img src="media/inverted-gold.png" alt="Lunardo Logo">
      <h1>LUNARDO CINEMA</h1>
      </div>
    </header>
    
    <nav>
      <ul id="navbar">
        <li><a href="#aboutus">ABOUT US</a></li>
        <li><a href="#prices">PRICES</a></li>
        <li><a href="#nowshowing">NOW SHOWING</a></li>
    </nav>
    
    <main>
      <div id="bg-image"><img src="media/mgalleryfade.png"></div>
      <section id="booking">  
        <div id="mainbox">
          <div id="movieimg"><img src="media/avatar2.jpg" alt="Avatar 2:Way of Water"></div>
          <div id="moviedetails">
            <div id="movie-title">Avatar: The Way of Water</div>
            <div id="rating">PG-13</div>
            <div id="movie-synopsis">Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.</div>
            <div id="movie-director">James Cameron</div>
            <div id="movie-stars">Sam Worthington, Zoe Saldana, Sugourney Weaver</div>
          </div>
          <div id="movie-trailer"><iframe width="560" height="315" src="https://www.youtube.com/embed/o5F8MOz_IDw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
        <div>
        <hr>
      </section>
      <section id ="booking-form">
        <div id ="form-box">
          <form action="/booking.php" method="post" onsubmit="">
            <input type="hidden" name="movie" value="ACT">
            
            <!-- drop down list-->
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
            <label for="seat[FCP]">Standard Adult</label>
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
            <label for="seat[FCC]">Standard Adult</label>
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


            <!-- radio buttons-->
            <input type="radio" name="day" value="MON" data-pricing="discprice" required> Monday 9PM <br>
            <input type="radio" name="day" value="TUE" data-pricing="fullprice" required> Tuesday 9PM <br>
            <input type="radio" name="day" value="WED" data-pricing="fullprice" required> Wednesday 9PM <br>
            <input type="radio" name="day" value="THU" data-pricing="fullprice" required> Thursday 9PM <br>
            <input type="radio" name="day" value="FRI" data-pricing="fullprice" required> Friday 9PM <br>
            <input type="radio" name="day" value="SAT" data-pricing="fullprice" required> Saturday 6PM <br>
            <input type="radio" name="day" value="SUN" data-pricing="fullprice" required> Sunday 6PM <br>

            <!-- required userdata-->
            <label for="user[name]">Full Name: </label><input type="text" name="user[name]" required><br>
            <label for="user[email]">Email Address: </label><input type="email" name="user[email]" required><br>
            <label for="user[mobile]">Mobile Number (format: 04XXXXXXXX): </label><input type="tel" name="user[mobile]" pattern="04+{8}" required><br>
            <input type="submit" value="Submit">
            
            



        </div>
      </section>
    </main>  
    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
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
