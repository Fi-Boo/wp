<?php
include_once 'tools.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['ref'])) {

        $_SESSION = getSelectedBooking($_POST['ref']);
        header("Location: receipt.php?printType=");
    }
}

headerModule('receipt');
?>

<nav id='nav'>
    <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
    <div id='header-img'>
        <div id="header-img-inner"></div>
    </div>
    <div id="navbar-r">
        <div id='nav-receipt'>
            <h3 id='book-title'> Booking History</h3>
        </div>
    </div>
</nav>

<main>
    <div id='bg-overlay'>
        <div id='filler'></div>
        <section id='booking-search'>
            <form method='post' >
                <label for="user[email]"> Email: </label>
                <input type="email" name="user[email]">
                <label for="user[mobile]"> Mobile Number: </label>
                <input type="tel" name="user[mobile]">
                <input type="submit" value="Search...">
            </form>
            <div>
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        searchBookingFunc($_POST);
                    }
                 ?>
            </div>
        </section>        
    </div>
</main>
<?php
footerModule();
debugModule();
?>


</body>

</html>