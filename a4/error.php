<?php
include 'tools.php';
headerModule('error');
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
        <div class="movie-title movie-title-bp"> Naughty Naughty!</div>
        <div class="movie-runtime">tsk! tsk!</div>
        <div class="movie-rating">tsk! tsk!</div>
      </div>
      <article id="bookings-info-grid">
        <div id="movie-trailer"><iframe src="https://giphy.com/embed/sa4DB1h62qWOaQ8xuq/video" title="tsk tsk"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe></div>
        <div id="movieimg"><img src='../../media/naughty.jpg' alt="naughty user"> </div>
        <div id="movie-synopsis">
          <p>!!! Congratulations !!! </p>
          <p>You have been sent here for doing something naughty.</p>
          <p>Please cease this naughtiness and return home. Do NOT collect $200 as you pass go.</p>
          <hr>
          <p>To return to the homepage press the button below.</p>
        </div>
      </article>
      <form action='index.php' onsubmit='return errorpress("3")'>
        <div id='error-tsktsk'></div>
        <div id='tsk-button-grid'>
          <div class="book-tickets-btn error1" onmouseover="errorpress('1')"><input type="submit" value="Home"></div>
          <div class="book-tickets-btn error2" onmouseover="errorpress('2')"><input type="submit" value="Home"></div>
          <div class="book-tickets-btn error3"><input type="submit" value="Home"></div>
        </div>
      </form>
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