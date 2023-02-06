<?php     

  include "tools.php"; 
  
  headerModule();
?>

    <script> navScroll('index'); </script>
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
              <td class="st">$<?= $seating['STA']['fullprice'] ?></td>
              <td class="std">$<?= $seating['STA']['discount'] ?></td>
              <td class="fc">$<?= $seating['FCA']['fullprice'] ?></td>
              <td class="fcd">$<?= $seating['FCA']['discount'] ?></td>
            </tr>
            <tr>
              <td class="nu">Concession</td>
              <td class="st">$<?= $seating['STP']['fullprice'] ?></td>
              <td class="std">$<?= $seating['STP']['discount'] ?></td>
              <td class="fc">$<?= $seating['FCP']['fullprice'] ?></td>
              <td class="fcd">$<?= $seating['FCP']['discount'] ?></td>
            </tr>
            <tr>
              <td class="nu">Child</td>
              <td class="st">$<?= $seating['STC']['fullprice'] ?></td>
              <td class="std">$<?= $seating['STC']['discount'] ?></td>
              <td class="fc">$<?= $seating['FCC']['fullprice'] ?></td>
              <td class="fcd">$<?= $seating['FCC']['discount'] ?></td>
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

        <?php
        nowShowingMovies();
        ?>

        </div>
      </section>
    </main>

    <?php 
    footerModule();
    debugModule();
     ?>
     
  </body>
</html>



