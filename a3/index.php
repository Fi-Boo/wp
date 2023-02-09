<?php     
  include "tools.php"; 
  
  session_unset();
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
        <?= contentModule('AboutUs','about-us'); ?> 
        <div class="sub-section-title" id="aboutus-whatsnew"><h2>What's New</h2></div>
        <?=  
          contentModule('AboutUs','new-seats');  
          contentModule('AboutUs','dolby'); 
          ?> 
      </section>

      <section id="prices">
        <div class="section-title" id="prices-title"><h2>Prices</h2></div>
        <div id="prices-grid">
          <?=  
            contentModule('SeatDesc','seat-std');  
            contentModule('SeatDesc','seat-fc'); 
            ?> 
        </div>
        <table id="pricestable">
          <tr>
            <td colspan="5"><cite><strong>*Daily <?= $discountTime ?> session and all day <?= $discountDay ?> day. </strong></cite></td>
          </tr>
          <tr>
            <th>Ticket</th>
            <th>Standard</th>
            <th>Discount</th>
            <th>First Class</th>
            <th>Discount</th>
          </tr>
          <tr>
            <td>Adult</td>
            <?= 
              tableData('STA');
              tableData('FCA');
              ?>
          </tr>
          <tr>
            <td>Concession</td>
            <?= 
              tableData('STP');
              tableData('FCP');
              ?>
          </tr>
          <tr>
            <td>Child</td>
            <?= 
              tableData('STC');
              tableData('FCC');
              ?>
          </tr>
        </table>
        <div id='test-grid'>
          <div class ='box'>
          <div id='test-container'>
            <div class="test-description">
              <p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
              <p>The Verona seat has 110 degree recliner, leg rests and large swivel table.</p>
            </div>
            <div class='test-banner'>
              <div id='slider'></div>
              <div class ='aside'><h3> Standard </h3></div>
            </div>
            <div class="test-img" >
              <img src="../../media/Profern-Standard-Twin.png" onmouseover="slideLeft()" onmouseout="slideRight()">
            </div>
          </div>
          </div>
          <div id='box'>
          <div id='test-container2'>
            <div class="test-description">
              <p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
              <p>The Verona seat has 110 degree recliner, leg rests and large swivel table.</p>
            </div>
            <div class='test-banner'>
              <div id='slider1'></div>
              <div class ='aside'><h3> Standard </h3></div>
            </div>
            <div class="test-img" >
              <img src="../../media/Profern-Standard-Twin.png" onmouseover="slideLeft1()" onmouseout="slideRight1()">
            </div>
          </div>
        </div>  
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



