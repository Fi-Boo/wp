<?php
  session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

// Function set up in a utilities file like tools.php
function pageHeader() {
  echo <<<"HEADERDATA"
  <!DOCTYPE html>
  <html lang='en'>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Lunardo Cinema Home Page</title>
  
      <!-- Keep wireframe.css for debugging, add your css to style.css -->
      <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
      <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?=filemtime("style.css"); ?>=>
      <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
      <script src='../wireframe.js'></script>
    </head>
  
    <body>
       
      <header> 
        <div id="header-bg"></div>
        <div id="company-name">Lunardo</div> 
      </header>
HEADERDATA;
}




?>