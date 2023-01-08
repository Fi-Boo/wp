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
      <div class="headercontainer">
        <div class="headerlogo"><img src="media/inverted-gold.png" class="logo"> </div>
        <div class="headertitle"><h1>LUNARDO CINEMA</h1></div>
      </div>
    </header>

    <nav>
      <ul class="navul">
        <li><h2>NOW SHOWING</h2></li>
        <li><h2>PRICING</h2></li>
        <li><h2>ABOUT US</h2></li>
    </nav>

    <main>
      <div class="main">
        <img src='media/website-under-construction.png' alt='Section Under Construction' />
        <p> NOW SHOWING COMING SOON </p>
      </div>
      <div class="mainprices">
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
      </div>
      <div class="main">
        <img src='media/website-under-construction.png' alt='Section Under Construction' />
        <h4> ABOUT US COMING SOON </h4>
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
