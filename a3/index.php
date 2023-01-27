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
        <li><a href="#aboutus">ABOUT US</a></li>
        <li><a href="#prices">PRICES</a></li>
        <li><a href="#nowshowing">NOW SHOWING</a></li>
      </ul>
    </nav>

    <main>
      <section id="aboutus">
        <div class="section-title"><h2>About Us</h2></div>
        <div class="aboutus-grid">
          <div class="aboutus-content aboutus-img"><img src="../../media/old-cinema.jpg" alt="old cinema sign"></div>
          <div class="aboutus-content aboutus-text">
            <cite><strong>"From humble beginnings..."</strong></cite>
            <p>Lunardo Cinema has been providing quality cinematic entertainment for local families since its founding in the early 1980s. As a family owned and run business, we pride ourselves on staying connected to each generation and providing a top tier personal experience to you, our customers. </p>
            <p>The pandemic was a trying time for us, but we used that down time to focus on giving a much needed facelift to our much loved facilities. These upgrades will ensure we continue to provide the best cinematic experience for years to come.</p>
          </div>
        </div>
        <div class="sub-section-title" id="aboutus-whatsnew"><h2>What's New</h2></div>
        <div class="aboutus-grid">
          <div class="aboutus-content aboutus-img"><img src="../../media/upgraded-seating.jpg" alt="upgraded seating image"></div>
          <div class="aboutus-content aboutus-text">
            <cite><strong>"Comfort and luxury while you watch..."</strong></cite>
            <p>All of our seating has been upgraded to meet the demands of the modern cinematic experience. These features include:</p>
            <ul>
              <li>110 degree recline</li>
              <li>flip up armrest</li>
              <li>inbuilt cupholders</li>
              <li>Leather trimmed seating (First Class only)</li>
            </ul>
          </div>
        </div>
        <div class="aboutus-grid">
          <div class="aboutus-content aboutus-img"><img src="../../media/dolby.png" alt="dolby logos"></div>
          <div class="aboutus-content aboutus-text">
            <cite><strong>"A truly immersive experience..."</strong></cite>
            <p>All cinema room projectors and sound systems have been upgraded with 3D Dolby Vision projection and Dobly Atomos sound to offer the best viewing experience for modern titles.</p>
          </div>
        </div>
      </section>

      <section id="prices">
        <div class="section-title" id="prices-title"><h2>Prices</h2></div>
        <div id="prices-grid">
          <div class="prices-content prices-img-block" id="prices-std-img">
            <div id="std-class"><p>Standard</p></div>
            <div class="prices-seat-img"><img src='../../media/Profern-Standard-Twin.png' alt='Standard Seat image'></div>
          </div>
          <div class="prices-content" id="prices-std-description">
            <p>The Profurn 9X8 seat is designed with a distinct headrest to improve acoustics and the sound experience without compromising on comfort or aesthetic.</p>
            <p>The 9X8 seat has retractable armrests and includes low level cup holders.</p>
          </div>
          <div class="prices-content prices-img-block" id="prices-fc-img">
            <div id="first-class"><p>First Class</p></div>
            <div class="prices-seat-img"><img src='../../media/Profern-Verona-Twin.png' alt='First Class Seat image'></div>
          </div>
          <div class="prices-content" id="prices-fc-description">
            <p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
            <p>The Verona seat has 110 degree recliner and leg rests and large swivel table.</p>
          </div>
          <table id="pricestable">
            <tr>
              <th class="nu">Ticket</th>
              <th class="st">Standard</th>
              <th class="std">*</th>
              <th class="fc">First Class</th>
              <th class="fcd">*</th>
            </tr>
            <tr>
              <td class="nu">Adult</td>
              <td class="st">$21.50</td>
              <td class="std">$16.00</td>
              <td class="fc">$31.50</td>
              <td class="fcd">$25.00</td>
            </tr>
            <tr>
              <td class="nu">Concession</td>
              <td class="st">$19.00</td>
              <td class="std">$14.50</td>
              <td class="fc">$28.00</td>
              <td class="fcd">$23.50</td>
            </tr>
            <tr>
              <td class="nu">Child</td>
              <td class="st">$17.50</td>
              <td class="std">$13.00</td>
              <td class="fc">$25.00</td>
              <td class="fcd">$22.00</td>
            </tr>
            <tr>
              <td colspan="5"><cite><strong>*Daily 12pm session and all day Monday. </strong></cite></td>
            </tr>
          </table>
        </div>
      </section>

      <section id="nowshowing">
        <div class="section-title" id="nowshowing-title"><h2>Now Showing</h2></div>
        <div id="movie-section-grid">
          <div class="movie-single">
            <div class="movie-detail">
              <div class="movie-title">Avatar 2: Way of water</div>
              <div class="movie-runtime">3h 12m</div>
              <div class="movie-rating">PG-13</div>
            </div>
            <div class="flip-card-container">
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="card-front">
                    <img src="../../media/avatar2.jpg">
                  </div>
                  <div class="card-back">
                    <p>Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.</p>
                    <cite><strong>Session Times</strong></cite>
                    <table>
                      <tr>
                        <th>Mon-Tue</th>
                        <th>Wed-Fri</th>
                        <th>Sat-Sun</th>
                      </tr>
                      <tr>
                        <td>9pm</td>
                        <td>9pm</td>
                        <td>6pm</td>
                      </tr>
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie=ACT">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="movie-single">
            <div class="movie-detail">
              <div class="movie-title">Weird: The Al Yankovic Story</div>
              <div class="movie-runtime">1h 48m</div>
              <div class="movie-rating">TV-14</div>
            </div>
            <div class="flip-card-container">
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="card-front">
                    <img src="../../media/weird.jpg">
                  </div>
                  <div class="card-back">
                    <p>Explores every facet of Yankovic's life, from his meteoric rise to fame with early hits like 'Eat It' and 'Like a Surgeon' to his torrid celebrity love affairs and famously depraved lifestyle.</p>
                    <cite><strong>Session Times</strong></cite>
                    <table>
                      <tr>
                        <th>Mon-Tue</th>
                        <th>Wed-Fri</th>
                        <th>Sat-Sun</th>
                      </tr>
                      <tr>
                        <td>-</td>
                        <td>12pm</td>
                        <td>3pm</td>
                      </tr>
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie=RMC">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="movie-single">
            <div class="movie-detail">
              <div class="movie-title">Puss in Boots: The Last Wish</div>
              <div class="movie-runtime">1hr 42m</div>
              <div class="movie-rating">PG</div>
            </div>
            <div class="flip-card-container">
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="card-front">
                    <img src="../../media/pussinboots.jpg">
                  </div>
                  <div class="card-back">
                    <p>Puss in Boots discovers that his passion for adventure has taken its toll: he has burned through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.</p>
                    <cite><strong>Session Times</strong></cite>
                    <table>
                      <tr>
                        <th>Mon-Tue</th>
                        <th>Wed-Fri</th>
                        <th>Sat-Sun</th>
                      </tr>
                      <tr>
                        <td>12pm</td>
                        <td>6pm</td>
                        <td>12pm</td>
                      </tr>
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie=FAM">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="movie-single">
            <div class="movie-detail">
              <div class="movie-title">Margrete: Queen of the North</div>
              <div class="movie-runtime">2h</div>
              <div class="movie-rating">MA-15+</div>
            </div>
            <div class="flip-card-container">
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="card-front">
                    <img src="../../media/margrete.jpg">
                  </div>
                  <div class="card-back">
                    <p>1402. Queen Margrete is ruling Sweden, Norway and Denmark through her adopted son, Erik. But a conspiracy is in the making and Margrete finds herself in an impossible dilemma that could shatter her life's work: the Kalmar Union.</p>
                    <cite><strong>Session Times</strong></cite>
                    <table>
                      <tr>
                        <th>Mon-Tue</th>
                        <th>Wed-Fri</th>
                        <th>Sat-Sun</th>
                      </tr>
                      <tr>
                        <td>6pm</td>
                        <td>-</td>
                        <td>10pm</td>
                      </tr>
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie=AHF">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div>&copy;<script>document.write(new Date().getFullYear());</script> 
      Phi Van Bui, s2008156D Group A. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
  </body>
</html>



