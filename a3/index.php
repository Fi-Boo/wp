<?php
include_once "tools.php";

session_unset();
headerModule('index');

?>

<script> navScroll('index'); </script>
<nav>
  <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
  <div id='header-img'><div id="header-img-inner"></div></div>
  <ul id="navbar-i">
    <li class='index-nav-li'><a href="#aboutus">ABOUT US</a></li>
    <li class='index-nav-li'><a href="#prices">PRICES</a></li>
    <li class='index-nav-li'><a href="#nowshowing">NOW SHOWING</a></li>
  </ul>
</nav>


<main>
  <div id='bg-overlay'>
    <div id='filler'></div>
    <section id="aboutus">
      <div class="section-title">
        <h2>About Us</h2>
      </div>
      <?= contentModule('AboutUs', 'about-us'); ?>
      <div class="sub-section-title" id="aboutus-whatsnew">
        <h2>What's New</h2>
      </div>
      <?=
        contentModule('AboutUs', 'new-seats');
      contentModule('AboutUs', 'dolby');
      ?>
    </section>

    <section id="prices">
      <div class="section-title" id="prices-title">
        <h2>Prices</h2>
      </div>
      <div id='prices-seat-grid'>
        <div id='prices-floating-text'>
          <p>"Modern Cush for</p>
          <p>your precious tush"</p>
        </div>
        <?=
          contentModule('SeatDesc', 'std');
        contentModule('SeatDesc', 'fc');
        ?>
      </div>
      <table id="pricestable">
        <tr>
          <td colspan="5">

            <cite><strong>
              <div id='discount-banner'>
                <div class='dollar'>$$</div>  
                <div class='text'>Discount: Any <?= $discountTime ?> sessions and all day <?= $discountDay ?>day </div>
                <div class='dollar'>$$</div>
              </div>
            </strong></cite>

          </td>
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
    </section>

    <section id="nowshowing">
      <div class="section-title" id="nowshowing-title">
        <h2>Now Showing</h2>
      </div>
      <div id="movie-section-grid">
        <?php
        nowShowingMovies();
        ?>
      </div>
    </section>
  </div>
</main>

<?php
footerModule();
debugModule();
?>
</div>
</div>
</div>
</body>

</html>