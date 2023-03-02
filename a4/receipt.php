<?php
include_once 'tools.php';

if (empty($_SESSION['movie'])) {
    header("Location: index.php"); // redirect if movie code invalid
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['printType'] != "" && ($_GET['printType'] != 'GROUP' && $_GET['printType'] != 'SINGLE')) {
        header("Location: error.php");
        exit();
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
            <h3 id='book-title'> Booking Confirmation</h3>
            <h3 id='book-ref'>
                <?= $_SESSION['ref'] ?>
            </h3>
        </div>
    </div>
</nav>

<main>
    <div id='bg-overlay'>
        <div id='filler'></div>
        <section id='sec-receipt'>
            <div id='receipt-grid'>
                <div id='receipt-print-head'>
                    <div id='receipt-logo'><img src='../../media/logo-blk.png' alt='Lunardo logo'></div>
                    <div id='company-details'>
                        <h2>Lunardo Cinema</h2>
                        1 Mystery Lane <br>
                        Fakeville 6000 <br>
                        Victora <br>
                        <hr>
                        e | info@lunardocinema.com.au <br>
                        t | (09) 9555 4554 <br>
                    </div>
                    <div id='receipt-ref'>
                        <h2>Booking <br> Confirmation </h2><br>
                        <h1>REF:
                            <?= $_SESSION['ref'] ?>
                        </h1>
                    </div>
                </div>

                <div id='receipt-details'>
                    <div id='receipt-user-details'>
                        <h3> User Details</h3>
                        <table>
                            <tr>
                                <td><img src='../../media/usericon.png'></td>
                                <td>
                                    <?= $_SESSION['user']['name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><img src='../../media/useremail.png'></td>
                                <td>
                                    <?= $_SESSION['user']['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><img src='../../media/usernumber.png'></td>
                                <td>
                                    <?= $_SESSION['user']['mobile']; ?>
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <div id='receipt-booking-details'>
                        <h3> Session Details </h3>
                    <?= generateMovieDetails($_SESSION); ?>
                    </div>
                </div>
                <div id='receipt-table'>
                    <h3> Tickets purchased </h3>
                    <?= generateSeatTable($_SESSION, 'receipt'); ?>
                </div>
                <div id='message'>
                    <h1> We look forward to seeing you soon... </h1>
                </div>
            </div>

            <form id='print-buttons' method='get'>
                <div class="receipt-print">
                    <button class="receipt-print-btn" name="printType" type="submit" value='GROUP'>Print Group
                        Ticket</button>
                </div>
                <div class="receipt-print">
                    <button class="receipt-print-btn" name="printType" type="submit" value='SINGLE'>Print Single
                        Tickets</button>
                </div>
            </form>

            <div id='receipt-tickets'>
                <?= generateTickets($_SESSION, $_GET['printType']); ?>
            </div>
            <br>
        </section>
    </div>
</main>
<?php
footerModule();
debugModule();
?>


</body>

</html>