<?php

include_once "tools.php";


// if request is post other - this ensures that code is not run the first time user goes to booking as that will be GET request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("post-validation.php");
  $errorsOut = validatePost();

  if (empty($errorsOut)) {
    $_SESSION = $_POST;
    printToFile('bookings.txt', $_POST);
    generateBR(6);
    header("Location: receipt.php?printType=");
  }
}

validateRequest($_GET['movie']);
headerModule();

?>

<script>
  navScroll('booking'); 
</script>
<nav>
  <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
  <div id='header-img'><div id="header-img-inner"></div></div>
  <ul id="navbar-b">
    <li class="nav-li"></li>
    <li class="nav-li"></li>
    <li class="nav-li"></li>
  </ul>
</nav>

<main>
  <div id='bg-overlay'>
    <div id='filler'></div>
    <section id="movie-data">
      <div id="movie-detail">
        <div class="movie-title movie-title-bp">
          <?= $movies[$_GET['movie']]["title"] ?>
        </div>
        <div class="movie-runtime">
          <?= $movies[$_GET['movie']]["runtime"] ?>
        </div>
        <div class="movie-rating">
          <?= $movies[$_GET['movie']]["rating"] ?>
        </div>
      </div>
      <article id="bookings-info-grid">
        <div id="movie-trailer">
          <iframe src='<?= $movies[$_GET['movie']]["trailer"] ?>' title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
          </iframe>
        </div>
        <div id="movieimg">
          <img src=<?= $movies[$_GET['movie']]["poster"] ?> alt='<?= $movies[$_GET['movie']]["title"] ?>'>
        </div>
        <div id="movie-synopsis">
          <?= $movies[$_GET['movie']]["synopsis"] ?>
        </div>
        <div id="movie-team">
          <hr>
          <div id="movie-director">
            <strong>Director: - </strong>
            <?= $movies[$_GET['movie']]["director"] ?>
          </div>
          <hr>
          <div id="movie-stars"><strong>Cast: - </strong>
            <?php
            foreach ($movies[$_GET['movie']]['actors'] as $actor) {
              echo "$actor - ";
            }
            ?>
          </div>
        </div>
      </article>
      <div id="booking-form">
        <form method='post'>
          <input type="hidden" name="movie" value="<?= $_GET['movie'] ?>">

          <div class="section-title">
            <h2>Select Session</h2>
          </div>

          <!-- radio buttons for session date selection-->
          <fieldset id="booking-day-select">
            <ul id="booking-date">
              <?= sessionSelection($_GET['movie']) ?>
            </ul>
            <div class="error-container">
              <div id="session-select-error"><?= unsetFB($errorsOut['day']); ?></div>
            </div>
          </fieldset>

          <div class="sub-section-title">
            <h2>Select your tickets</h2>
          </div>

          <!-- drop down list for ticket selection-->
          <fieldset id="ticket-select">
            <div>
              <table id="ticketing-table">
                <tr>
                  <th>Seating</th>
                  <th>Price</th>
                  <th>Select</th>
                  <th>Subtotals</th>
                </tr>
                <?php ticketTable(); ?>
                <tr>
                  <th class="error-container" colspan="3">
                    <div id="tickets-select-error"><?= unsetFB($errorsOut['seats']); ?></div>
                  </th>

                  <th id="booking-price-total"></th>
                </tr>
              </table>
            </div>
            <div id="ticket-total"> </div>
          </fieldset>

          <div class="section-title">
            <h2>Your Details</h2>
          </div>

          <!-- required userdata-->
          <fieldset id="your-details">

            <div id="details-grid">
              <div>
                <table id="details-table">
                  <?php yourDetailsTr(); ?>
                </table>
              </div>
              <div class="book-tickets-btn">
                <input type="submit" value="Book Tickets" >
                <input type="submit" value="no Validation" formnovalidate>
              </div>
            </div>
          </fieldset>
        </form>
      </div>

    </section>
  </div>
</main>
<script>
  calculateSubTotals();
</script>
<?php
footerModule();
debugModule();
?>
</div>
</div>
</div>
</body>

</html>