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
            <div id='nav-receipt'><h3> We look forward to seeing you soon...</h3>
            </div>
        </div>
    </nav>

    <section>
        <div id ='receipt-grid'>
            <div id = 'print-header-details'>
                <div id='-flex'>
                    <div id ='footer-flex-inner'>
                        <div id='footer-logo'><img src='../../media/logo-blk.png'></div>
                        <div id='company-details'>
                        <h2>Lunardo Cinema</h2> 
                        1 Mystery Lane <br>
                        Fakeville 6000 <br>
                        Victora <br>
                        <hr>
                        e | info@lunardocinema.com.au <br>
                        t | (09) 9555 4554 <br>
                    </div>
                </div>
            </div>
        
            
            <div id = 'receipt-user-details'>
                <h2> Booking Confirmation #XPR2AY</h2>
                <p> <?= $_SESSION['user']['name']; ?> </p>
                <p> e: <?= $_SESSION['user']['email']; ?> </p>
                <p> t: <?= $_SESSION['user']['mobile']; ?> </p>
                <br>
                <hr>
            </div>    
            <div id = 'receipt-booking-details'>
                <h2> Session Details </h2>
                <p> Movie: <?= $movies[$_SESSION['movie']]['title']; ?></p>
                <p> Session: Next <?= $_SESSION['day']; ?>day <?= getSessionTime($_SESSION); ?></p>
                <br>
                <hr>
            </div>
            <div id = 'receipt-table'>
                <table>    
                    <?= generateReceiptTable($_SESSION); ?>
                </table>
            </div>
        </div>
    </section>
    <?php 
        footerModule();
        debugModule(); 
    ?>
</body>
</html>