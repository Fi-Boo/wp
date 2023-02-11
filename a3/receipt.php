<?php
    include 'tools.php';

    if(empty($_SESSION['movie'])) {
        header("Location: index.php"); // redirect if movie code invalid
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($_GET['printType'] != "" && ($_GET['printType'] != 'GROUP' && $_GET['printType'] != 'SINGLE' )) {
            header("Location: error.php");
            exit();
        }  

    }

    headerModule();
?>

    <nav>
        <div id="logo"><a href="index.php"><img src="../../media/logo-gold.png" alt="Logo and home button"></a></div>
        <div id="navbar">
            <div id='nav-receipt'><h3 id='book-title'> Booking Confirmation</h3><h3 id='book-ref'>[ <?= $_SESSION['ref'] ?> ]</h3>
            </div>
        </div>
    </nav>

    <section id='sec-receipt'>
        <div id='receipt-grid'>
            <div id= 'receipt-print-head'>
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
                    <h1>REF: <?= $_SESSION['ref']  ?></h1>
                </div>
            </div>

            <div id='receipt-details'>
                <div id = 'receipt-user-details'>
                    <h3> User Details</h3>
                    <p> <?= $_SESSION['user']['name']; ?> </p>
                    <p>(e): <?= $_SESSION['user']['email']; ?> </p>
                    <p>(t): <?= $_SESSION['user']['mobile']; ?> </p>
                    <hr>
                </div>    
                <div id = 'receipt-booking-details'>
                    <h3> Session Details </h3>
                    - MOVIE -
                    <h4> <?= $movies[$_SESSION['movie']]['title']; ?> <br>
                    (<?= $movies[$_SESSION['movie']]['rating'] ?>)</h4>
                    - DATE & TIME -

                    <!-- YES date is intentional. looked too bare without a date and too lazy to find code to generate date so i thought i'd add a meme date to pay homage to Avatars million years between movie releases -->
                    <h4> 31/2/2512 <?= $_SESSION['day']; ?> @  
                    <?= getSessionTime($_SESSION); ?></h4>
                </div>
            </div>
            <div id = 'receipt-table'>         
                <?= generateSeatTable($_SESSION,'receipt'); ?>
            </div>
            <div id='message'>
                <h1> We look forward to seeing you soon... </h1>
            </div>
        </div>

        <form id='print-buttons' method='get'>
            <div class="receipt-print">
                <button class="receipt-print-btn" name="printType" type="submit" value='GROUP'>Print Group Ticket</button>
            </div>
            <div class="receipt-print">
                <button class="receipt-print-btn" name="printType" type="submit" value='SINGLE'>Print Single Tickets</button>
            </div>
        </form>

        <div id='receipt-tickets'>
            <?= generateTickets($_SESSION,$_GET['printType']); ?>
        </div>
        <br>
    </section>
    <?php 
        footerModule();
        debugModule(); 
    ?>
</body>
</html>




