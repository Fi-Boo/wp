<?php
    include 'tools.php';
    headerModule();
?>

<script> 
      navScroll('booking'); 
    </script>
    <nav>
      <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
      <ul id="navbar">
        <li class="nav-li"><a href="#aboutus"></a></li>
        <li class="nav-li"><a href="#prices"></a></li>
        <li class="nav-li"><a href="#nowshowing"></a></li>
      </ul>
    </nav>

    <main>
    <section id="movie-data">  
        <div id="movie-detail">
            <div class="movie-title movie-title-bp"> Naughty Naughty!</div>
            <div class="movie-runtime">tsk! tsk!</div>
            <div class="movie-rating">tsk! tsk!</div>
        </div>
        <article id="bookings-info-grid">
            <div id="movie-trailer"><iframe src ="https://giphy.com/embed/sa4DB1h62qWOaQ8xuq/video" title="tsk tsk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
            <div id="movieimg"><img src ='../../media/naughty.jpg' alt = "naughty user"> </div>
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
                <div class="book-tickets-btn error1" onmouseover="errorpress('1')"><input type="submit" value="Home" ></div>
                <div class="book-tickets-btn error2" onmouseover="errorpress('2')"><input type="submit" value="Home" ></div>
                <div class="book-tickets-btn error3" ><input type="submit" value="Home" ></div>
            </div>
        </form>
    </section>
    </main>
    <?php 
    footerModule();
    debugModule(); 
    ?>

  </body>
</html>
