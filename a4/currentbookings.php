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
        <div id='filler'></div>
        <section id='booking-search'>
            <form method='post' >
                <div id="search-fields">
                    <table id="details-table">
                        <tr>
                            <th>
                                <label for="user[email]"> Email: </label>
                            </th>
                            <td>
                                <input type="email" name="user[email]" placeholder="johnsmith@gmail.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                            </td>
                            <td rowspan='2'>
                                <div id="search-button">  
                                    <input type="submit" value="Search">
                                </div>
                            </td>
                        </tr>
                        <tr id="search-bookings">
                            <th>          
                                <label for="user[mobile]"> Mobile Number: </label>
                            </th>
                            <td>
                                <input type="tel" name="user[mobile]" placeholder="04XXXXXXXX" pattern="(\(04\)|04|\+614)( ?\d){8}">
                            </td>
                        </tr>                 
                    </table>  
                    
                </div>
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