<?php
    include 'tools.php';

    if(empty($_SESSION['movie'])) {
        //header("Location: index.php"); // redirect if movie code invalid
        //exit();
    }

    headerModule();
?>

    <nav>
        <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
        <div id="navbar">
            <div id='nav-receipt'><h3 id='book-title'> Booking Confirmation</h3><h3 id='book-ref'>[ X9T4TH ]</h3>
            </div>
        </div>
    </nav>

    <section id='sec-receipt'>
        <div id='receipt-grid'>
            <div id= 'receipt-print-head'>
                <div id='receipt-logo'><img src='../../media/logo-blk.png'></div>
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
                    <h1>REF: X9T4TH</h1>
                </div>
            </div>

            <div id='receipt-details'>
                <div id = 'receipt-user-details'>
                    <hr>
                    <h3> User Details</h3>
                    <p> <?= $_SESSION['user']['name']; ?> </p>
                    <p>(e): <?= $_SESSION['user']['email']; ?> </p>
                    <p>(t): <?= $_SESSION['user']['mobile']; ?> </p>
                    <hr>
                </div>    
                <div id = 'receipt-booking-details'>
                    <h3> Session Details </h3>
                    <p> <?= $movies[$_SESSION['movie']]['title']; ?></p>
                    <p> <?= $_SESSION['day']; ?>day <?= getSessionTime($_SESSION); ?></p>
                    <hr>
                </div>
            </div>
        </div>
            <div id = 'receipt-table'>
                <table>    
                    <?= generateReceiptTable($_SESSION); ?>
                </table>
            </div>
            <div id='message'>
                <h1> We look forward to seeing you soon... </h1>
            </div>
            <div id='receipt-tickets'>
            </div>
        </div>
    </section>
    <?php 
        footerModule();
        debugModule(); 
    ?>
</body>
</html>