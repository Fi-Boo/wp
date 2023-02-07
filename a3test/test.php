<?php
    include 'tools.php';


    $movie ='';
    $day ='';

    $movie = trim($_POST['movie']);
    $day = trim($_POST['day']);


    $movieFAKE = 'XXX';


    function unsetFB (&$str, $fallback = '') {
        return ( isset($str) ? $str : $fallback );
    }


    



?>

<!DOCTYPE html>
<html>
<br><br>
<p> movie from $_POST: <?= $movie ?> </p>
<p> day from $_POST: <?= $day ?> </p>
<p> fake movie: <?= $movieFAKE ?> </p>
<a href="booking.php?movie=<?= $movie ?>">GO BACK TO BOOKING</a></br>
<a href="booking.php?movie=<?= $movieFAKE ?>">This should redirect to Index.php</a>


</html>
















<?php
debugModule();
?>