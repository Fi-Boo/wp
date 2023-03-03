<?php
include_once 'tools.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['ref'])) {

        $_SESSION = getSelectedBooking($_POST['ref']);
        header("Location: receipt.php?printType=");
    }
}

// session_unset();
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
        <div class='filler'></div>

            <div>
                <?= searchBookingFunc($_POST); ?>
            </div>
       
    </div>
</main>
<?php
footerModule();
debugModule();
?>


</body>

</html>