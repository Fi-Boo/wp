<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  </head>

  <body>
    <header> 
      <div id="header">
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
      <section id="aboutus">  
        <h2>ABOUT US</h2>
        <hr>
        <div class="aboutus-info">
          <img src="media/old-cinema.jpg" alt="old cinema sign">
          <div class="content">
            <p>"From humble beginnings..."</p>
            <p>Lunardo Cinema has been providing quality cinematic entertainment for local families since its founding in the early 1980s. As a family owned and run business, we pride ourselves on staying connected to each generation and providing a top tier personal experience to you, our customers. </p>
            <p>The pandemic was a trying time for us, but we used that down time to focus on giving a much needed facelift to our much loved facilities. These upgrades will ensure we continue to provide the best cinematic experience for years to come.</p>
          </div>
        </div>
        <h2>WHAT'S NEW?</h2>
        <hr>
        <div class="aboutus-info">
          <img src="media/upgraded-seating.jpg" alt="upgraded seating image">
          <div class="content">
            <p>"Comfort and luxury while you watch..."</p>
            <p>All of our seating has been upgraded to meet the demands of the modern cinematic experience. These features include:</p>
            <ul>
              <li>110 degree recline</li>
              <li>flip up armrest</li>
              <li>inbuilt cupholders</li>
              <li>Leather trimmed seating (First Class only)</li>
            </ul>
          </div>
        </div>
        <div class="aboutus-info"> 
          <img src="media/dolby.png" alt="dolby logos">
          <div class="content">
            <p>"A truly immersive experience..."<p>
            <p>All cinema room projectors and sound systems have been upgraded with 3D Dolby Vision projection and Dobly Atomos sound to offer the best viewing experience for modern titles.</p>
          </div>
        </div> 
        <hr>    
      </section>  

      <section class="mainprices">
        <h2> PRICES </h2>
        <ul class="seatsection">
          <li class="seating">
            <ul>
              <li>
                <ul class="imgdesc">
                  <li class="seatimg"><img src='media/Profern-Standard-Twin.png' alt='Standard Seat image'></li>
                  <li class="seatdescrip">
                    <p>The Profern 9X8 seat is designed with a distinct headrest to improve acoustics and the sound experience without compromising on comfort or aesthetic.</p>
                    <p>The 9X8 seat has retractable armrests and includes low level cup holders.</p>  
                  </li>
                </ul>
              </li>
              <li class ="seatpricing">
                <ul>
                  <li>
                    <ul class="seatinfobar">
                      <li>
                        <ul class="seattype">
                          <li>Seat Type</li>
                          <li>Standard Adult</li>
                          <li>Standard Concession</li>
                          <li>Standard Child</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="seatcode">
                          <li>Seat Code</li>
                          <li>STA</li>
                          <li>STP</li>
                          <li>STC</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="regularprice">
                          <li>Regular Price</li>
                          <li>$21.50</li>
                          <li>$19.00</li>
                          <li>$17.50</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="discountprice">
                          <li>Discount* Price</li>
                          <li>$16.00</li>
                          <li>$14.50</li>
                          <li>$13.00</li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>  
              </li>    
            </ul>  
          </li>
          <li class="seating">
            <ul>
              <li>
                <ul class="imgdesc">
                  <li class="seatimg"><img src='media/Profern-Verona-twin.png' alt='First Class Seat image'></li>
                  <li class="seatdescrip">
                    <p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
                    <p>The Verona seat has 110 degree recliner and leg rests and large swivel table.</p>  
                  </li>
                </ul>
              </li>
              <li class ="seatpricing">
                <ul>
                  <li>
                    <ul class="seatinfobar">
                      <li>
                        <ul class="seattype">
                          <li>Seat Type</li>
                          <li>First Class Adult</li>
                          <li>First Class Concession</li>
                          <li>First Class Child</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="seatcode">
                          <li>Seat Code</li>
                          <li>FCA</li>
                          <li>FCP</li>
                          <li>FCC</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="regularprice">
                          <li>Regular Price</li>
                          <li>$31.50</li>
                          <li>$28.00</li>
                          <li>$25.00</li>
                        </ul>
                      </li>
                      <li>
                        <ul class="discountprice">
                          <li>Discount* Price</li>
                          <li>$25.00</li>
                          <li>$23.50</li>
                          <li>$22.00</li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>  
              </li>    
            </ul>  
          </li>
        </ul>
        <h4>* The Cinema offers discounted pricing weekday afternoons (ie 12pm weekday matinée sessions) and all day on Mondays. </h4>
      </section>

      <div class="main">
        <img src='media/website-under-construction.png' alt='Section Under Construction' />
        <p> NOW SHOWING COMING SOON </p>
      </div>
      
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
