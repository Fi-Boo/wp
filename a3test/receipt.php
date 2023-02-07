<?php
    include 'tools.php';

    if(empty($_SESSION)) {
        header("Location: index.php"); // redirect if movie code invalid
        exit();
    }
    print_r($_SESSION);
?>

<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h1> RECEIPT PAGE</h1>
    </body>
</html>