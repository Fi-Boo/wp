<?php
  session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

// Function set up in a utilities file like tools.php

// --- SECTIONS ---
// sections data are organised in alphabetical order 
// 1. Variables and Arrays
// 2. Functions
// 3. Testing Zone - for functions used in test code. 





// 1. Variables and Arrays 

// content for #about us page. All sections consist of an image and some data
$aboutUsContent = [
  'about-us' => [
    'image' => 'old-cinema.jpg',
    'image-alt' => 'old cinema sign',
    'cite' => 'From humble beginnings...',
    'text' => '<p>Lunardo Cinema has been providing quality cinematic entertainment for local families since its founding in the early 1980s. As a family owned and run business, we pride ourselves on staying connected to each generation and providing a top tier personal experience to you, our customers. </p>
    <p>The pandemic was a trying time for us, but we used that down time to focus on giving a much needed facelift to our much loved facilities. These upgrades will ensure we continue to provide the best cinematic experience for years to come.</p>'
  ],
  'new-seats' => [
    'image' => 'upgraded-seating.jpg',
    'image-alt' => 'upgraded seating image',
    'cite' => 'Comfort and luxury while you watch...',
    'text' => '<p>All of our seating has been upgraded to meet the demands of the modern cinematic experience. These features include:</p>
    <ul>
      <li>110 degree recline</li>
      <li>flip up armrest</li>
      <li>inbuilt cupholders</li>
      <li>Leather trimmed seating (First Class only)</li>
    </ul>'
  ],
  'dolby' => [
    'image' => 'dolby.png',
    'image-alt' => 'dolby logos',
    'cite' => 'A truly immersive experience...',
    'text' => '<p>All cinema room projectors and sound systems have been upgraded with 3D Dolby Vision projection and Dobly Atomos sound to offer the best viewing experience for modern titles.</p>'
  ],
  'seat-std' => [
    'image' => 'Profern-Standard-Twin.png',
    'image-alt' => 'Standard',
    'cite' => 'std',
    'text' => '<p>The Profurn 9X8 seat is designed with a distinct headrest to improve acoustics and the sound experience without compromising on comfort or aesthetic.</p>
    <p>The 9X8 seat has retractable armrests and includes low level cup holders.</p>'
  ],
  'seat-fc' => [
    'image' => 'Profern-Verona-Twin.png',
    'image-alt' => 'First Class',
    'cite' => 'fc',
    'text' => "<p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
    <p>The Verona seat has 110 degree recliner and leg rests and large swivel table.</p>"
  ]
];

$discountDay = 'Mon';
$discountTime = '12pm';
$currentSelection = [];
$pricing;


//main movie array. Possibly change to objects if time permits
$movies = [
  "ACT" => [
    "code" => "ACT",
    "title" => "Avatar 2: Way of water",
    "runtime" => "3h 12m",
    "rating" => "PG-13",
    "poster" => "../../media/Avatar2.jpg",
    "ticket-img" => "../../media/Avatar2-tkt.png",
    "synopsis" => "Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na'vi race to protect their home.",
    "trailer" => "https://www.youtube.com/embed/o5F8MOz_IDw",
    "director" => "James Cameron",
    "actors" => [
      "actor1" => "Sam Worthington",
      "actor2" => "Zoe Saldana",
      "actor3" => "Sigourney Weaver"
    ],
    "screenings" => [
      "Mon" => "9pm",
      "Tue" => "9pm",
      "Wed" => "9pm",
      "Thu" => "9pm",
      "Fri" => "9pm",
      "Sat" => "6pm",
      "Sun" => "6pm"
    ]
  ],
  "RMC" => [
    "code" => "RMC",
    "title" => "Weird: The Al Yankovic Story",
    "runtime" => "1h 48m",
    "rating" => "TV-14",
    "poster" => "../../media/weird.jpg",
    "ticket-img" => "../../media/weird-tkt.png",
    "synopsis" => "Explores every facet of Yankovic's life, from his meteoric rise to fame with early hits like 'Eat It' and 'Like a Surgeon' to his torrid celebrity love affairs and famously depraved lifestyle.",
    "trailer" => "https://www.youtube.com/embed/RyYZOtAxYKY",
    "director" => "Eric Appel",
    "actors" => [
      "actor1" => "Diedrich Bader",
      "actor2" => "Daniel Radcliffe",
      "actor3" => "Lin-Manuel Miranda"
    ],
    "screenings" => [
      "Mon" => "-",
      "Tue" => "-",
      "Wed" => "12pm",
      "Thu" => "12pm",
      "Fri" => "12pm",
      "Sat" => "3pm",
      "Sun" => "3pm"
    ]
  ],
  "FAM" => [
    "code" => "FAM",
    "title" => "Puss in Boots: The Last Wish",
    "runtime" => "1hr 42m",
    "rating" => "PG",
    "poster" => "../../media/pussinboots.jpg",
    "ticket-img" => "../../media/pussinboots-tkt.png",
    "synopsis" => "Puss in Boots discovers that his passion for adventure has taken its toll: he has burned through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.",
    "trailer" => "https://www.youtube.com/embed/RqrXhwS33yc",
    "director" => "Joel Crawford",
    "actors" => [
      "actor1" => "Antonio Banderas",
      "actor2" => "Salma Hayek",
      "actor3" => "Harvey Guillen"
    ],
    "screenings" => [
      "Mon" => "12pm",
      "Tue" => "12pm",
      "Wed" => "6pm",
      "Thu" => "6pm",
      "Fri" => "6pm",
      "Sat" => "12pm",
      "Sun" => "12pm"
    ]
  ],
  "AHF" => [
    "code" => "AHF",
    "title" => "Margrete: Queen of the North",
    "runtime" => "2h",
    "rating" => "MA-15+",
    "poster" => "../../media/margrete.jpg",
    "ticket-img" => "../../media/margrete-tkt.png",
    "synopsis" => "1402. Queen Margrete is ruling Sweden, Norway and Denmark through her adopted son, Erik. But a conspiracy is in the making and Margrete finds herself in an impossible dilemma that could shatter her life's work: the Kalmar Union.",
    "trailer" => "https://www.youtube.com/embed/-7OCX98JgGk",
    "director" => "Charlotte Sieling",
    "actors" => [
      "actor1" => "Trine Dyrholm",
      "actor2" => "Soren Malling",
      "actor3" => "Morten Hee Andersen",
    ],
    "screenings" => [
      "Mon" => "6pm",
      "Tue" => "6pm",
      "Wed" => "-",
      "Thu" => "-",
      "Fri" => "-",
      "Sat" => "10pm",
      "Sun" => "10pm"
    ]
  ]
];


// seating type and price array
$seating = [
  "STA" => [
    "code" => "STA",
    "desc" => "Standard Adult",
    "fullprice" => "21.50",
    "discprice" => "16.00"
  ],
  "STP" => [
    "code" => "STP",
    "desc" => "Standard Concession",
    "fullprice" => "19.00",
    "discprice" => "14.50"
  ],
  "STC" => [
    "code" => "STC",
    "desc" => "Standard Child",
    "fullprice" => "17.50",
    "discprice" => "13.00"
  ],
  "FCA" => [
    "code" => "FCA",
    "desc" => "First Class Adult",
    "fullprice" => "31.50",
    "discprice" => "25.00"
  ],
  "FCP" => [
    "code" => "FCP",
    "desc" => "First Class Concession",
    "fullprice" => "28.00",
    "discprice" => "23.50"
  ],
  "FCC" => [
    "code" => "FCC",
    "desc" => "First Class Child",
    "fullprice" => "25.00",
    "discprice" => "22.00"
  ]
];




// ---------------- ABOUT US and  PRICING MODULE img/text MODULE -----------------------
// reduces code block to generate image on left with text on the right
// layout generation is based on parameter 1.
 
function contentModule($var1, $var2) {
  global $aboutUsContent;

  if (isset($aboutUsContent[$var2])) {
    $content = $aboutUsContent[$var2];

    if ($var1 == 'AboutUs') {
      
      echo <<<"ABOUTUS"
        <div class="aboutus-grid">
          <div class="aboutus-content aboutus-img"><img src="../../media/{$content['image']}" alt="{$content['image-alt']}"></div>
          <div class="aboutus-content aboutus-text">
            <cite><strong>"{$content['cite']}"</strong></cite>
            {$content['text']}
          </div>
        </div>
      ABOUTUS;

    } elseif ($var1 == 'SeatDesc') {
      
      echo <<<"SEATINGDESC"
        <div class="prices-img-block" id="prices-{$content['cite']}-img">
          <div id="{$content['cite']}-class"><p>{$content['image-alt']}</p></div>
          <div class="prices-seat-img"><img src="../../media/{$content['image']}" alt="{$content['image-alt']}" seat></div>
        </div>
        <div class="prices-content" id="prices-{$content['cite']}-description">
          {$content['text']}
        </div>
      SEATINGDESC;
    } else {
      echo "Error with parameter 1. Currently only taking 'AboutUs' or 'SeatDesc'"; 
    }

  } else {
    echo 'There be errors with paremeter2 parameter!';
  }
}

//-----------------------------------------------------------------------------------


// -- Debugging module for outputting GET/POST/SESSION/page code
function debugModule() {    
  echo "<pre id='debug'>";  
  echo "GET contains:<br>";   
  print_r($_GET);
  echo "POST contains:<br>";  
  print_r($_POST);
  echo "SESSION Contains:<br>";
  print_r($_SESSION); 
  echo "SITE code:<br>";
  printMyCode(); 
  echo "</pre>";    
}

//-------------------------------------------------------------------------------------

// FOOTER CODE
function footerModule() {

  $date = date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME']));

  echo <<<"FOOTER"
  <footer>
    <div id='footer-container'>
      <div id='footer-flex'>
        <div id ='footer-flex-inner'>
          <div id='footer-logo'><img src='../../media/logo-blk.png'></div>
          <div id='company-details'>
            <h2>Lunardo Cinema</h2> 
            1 Mystery Lane <br>
            Fakeville 6000 <br>
            Victora <br>
          </div>
        </div>
        <div id='contact-us'>
          <p>Contact Us</p>
          <p>Lunardo Careers</p>
          <div id='socialmedia'>
            <div class='socialmedia-img'><img src='../../media/facebookblk.png'></div>
            <div class='socialmedia-img'><img src='../../media/twitter.png'></div>
            <div class='socialmedia-img'><img src='../../media/instagram.png'></div>
          </div>
        </div>
      </div>
      <hr>
      <div id='disclaimer'>
        <div>&copy;<script>document.write(new Date().getFullYear());</script>Phi Van Bui, s2008156D Group A. Last modified $date</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
      </div>
    </div>
  </footer>
  FOOTER;
}
//-------------------------------------------------------------------------------------

// format string to 2 decimal places
function format($str) {
  return number_format($str,2);
}
//-------------------------------------------------------------------------------------

// function that generates a random 6 character BR - Booking Reference
function generateBR($n) {
  global $bookingRef;

    // https://www.geeksforgeeks.org/generating-random-string-using-php/
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    $_SESSION['ref'] = $randomString;
}
//-------------------------------------------------------------------------------------

function generateSeatTable($SESSION,$var) {
  global $movies;
  global $seating;
  $selectedMovie = $movies[$SESSION['movie']];
  $movieDate = $SESSION['day'];
  $movieTime = getSessionTime($SESSION);
  $priceType = getPriceType($movieDate, $movieTime);
  $total = (float)'0';
  $GST = (float)'0';

  echo '<table>';

  foreach ($SESSION['seats'] as $seat => $number) {
    if (!empty($number)) {
      $subtotal = format(getSeatSubtotal($seat,$number,$priceType));
      $total += (float)$subtotal;
      $seatDesc = $seating[$seat]['desc'];
      $total = format($total);
      $dataStr ='';
      
      if ($var == 'receipt') {
        $dataStr = '<td>$' . $subtotal . '</td>';
      } 

      echo <<<"RECEIPT"
        <tr>
          <td>$seatDesc</td>
          <td>x $number</td>
          $dataStr
        </tr>  
      RECEIPT;
    }
  }

  if ($var == 'receipt') {

    $GST = format($total/11);
    echo <<<"RECEIPTP2"
      <tr>
        <td colspan='2'>included GST:</td>
        <td>$$GST</td>
      </tr>
      <tr>
        <td colspan='2'>Total:</td>
        <td><h3>$$total</h3></td>
      </tr>
    
    RECEIPTP2;
  }
  echo '</table>';

}
//-------------------------------------------------------------------------------------

// generates either a group ticket of individual tickets for booking. Based of parameter $var
function generateTickets($SESSION, $var) {

  global $movies;
  global $seating;

  $sessionTime = getSessionTime($SESSION);
  $totalTickets = getTotalTickets($SESSION);

  SWITCH ($var) {
    case ('GROUP'):
      echo <<<"GENTIXG"
        <div id='ticket-group'>
          <div class='ticket-logo'><img src="../../media/logo-gold.png" alt='company logo'></div>
          <div class='ticket-img'><img src="{$movies[$SESSION['movie']]['ticket-img']}" alt='{$movies[$SESSION['movie']]['title']}'></div>
          <div class='ticket-details'> 
              <h3> Session Details </h3>
              - MOVIE -
              <h4> {$movies[$SESSION['movie']]['title']} <br>
              ({$movies[$SESSION['movie']]['rating']})</h4>
              - DATE & TIME -
              <h4> 31/2/2512 {$SESSION['day']}day 
              {$sessionTime}</h4>
              - ADMISSION TYPE: <h3>GROUP ({$totalTickets})</h3> 
      GENTIXG;
      generateSeatTable($SESSION,'ticket');
      echo <<<"GENTIXG2"
              <br>
              <div class='receipt-barcode'>
                  <img src="../../media/barcode.png" alt='ticket barcode'>
              </div>
              <h3>{$SESSION['ref']}-GT{$totalTickets}</h3>
              <hr>
              <div class='receipt-appleG'>
                  <img src="../../media/applewallet.png" alt='ticket barcode'>
              </div>
              <hr>
              <div class='receipt-appleG'>
                  <img src="../../media/gpay.png" alt='ticket barcode'>
              </div>
          </div>
        </div>
      GENTIXG2;
      break;
    case ('SINGLE'):
      foreach ($SESSION['seats'] as $seat => $number) {
        if (!empty($number)) {
          for ($i = 1; $i <= $number; $i++) {
            echo <<<"GENTIXS"
              <div class='ticket-single'>
                <div class='ticket-logo'><img src="../../media/logo-gold.png" alt='company logo'></div>
                <div class='ticket-img'><img src="{$movies[$SESSION['movie']]['ticket-img']}" alt='{$movies[$SESSION['movie']]['title']}'></div>
                <div class='ticket-details'> 
                    <h3> Session Details </h3>
                    - MOVIE -
                    <h4> {$movies[$SESSION['movie']]['title']} <br>
                    ({$movies[$SESSION['movie']]['rating']})</h4>
                    - DATE & TIME -
                    <h4> 31/2/2512 {$SESSION['day']}day 
                    {$sessionTime}</h4>
                    - ADMISSION TYPE: <h3>SINGLE</h3> 
                    <div class='seatType'> {$seating[$seat]['desc']} x1</div>
                    <br>
                    <div class='receipt-barcode'>
                        <img src="../../media/barcode.png" alt='ticket barcode'>
                    </div>
                    <h3>{$SESSION['ref']}-{$seat}{$i}</h3>
                    <hr>
                    <div class='receipt-appleG'>
                        <img src="../../media/applewallet.png" alt='ticket barcode'>
                    </div>
                    <hr>
                    <div class='receipt-appleG'>
                        <img src="../../media/gpay.png" alt='ticket barcode'>
                    </div>
                </div>
              </div>
            GENTIXS;
          }
        }
      };
      break;
  }
}
//-------------------------------------------------------------------------------------

function getPriceType($movieDate, $movieTime) {
  if ($movieDate == 'Mon' || $movieTime == '12pm') {
    return 'discprice';
  } else {
    return 'fullprice';
  }
}
//-------------------------------------------------------------------------------------

// gets seat subtotal. Assume data is valid as it's passed POST validation.
// matches seat code and price type (discount or full) and uses corresponding value to calculate subtotal
function getSeatSubtotal($seat,$amount,$priceType) {
  global $seating;
  
  foreach ($seating[$seat] as $type => $value) {
    if ($type == $priceType) {
      return ((float)$amount*(float)$value);
    }
  }
}
//-------------------------------------------------------------------------------------

function getSessionTime($SESSION) {
  global $movies;
  $selectedMovie = $movies[$SESSION['movie']];

  foreach ($selectedMovie['screenings'] as $day => $time) {
    if ($day == $SESSION['day']) {
      return $time;
    }
  }
}
//-------------------------------------------------------------------------------------

function getTotalTickets($SESSION) {
  $totalSeats = (int)0;
  $strOut;
  
   foreach ($SESSION['seats'] as $seat => $number) {
     if (!empty($number)) {
       $totalSeats += (int)$number;
     }
   }
 
   if ($totalSeats < 10) {
     $strOut = '0'.(string)$totalSeats;
   }
 
   return $strOut;
}
//-------------------------------------------------------------------------------------

//  header block. includes doctype and header. Nav not included 
function headerModule() {

  $value = filemtime('style.css');


  echo <<<"HEADER"
    <!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lunardo Cinema Home Page</title>

        <!-- Keep wireframe.css for debugging, add your css to style.css -->
        <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
        <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t={$value}">
        <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
        <script src='../wireframe.js'></script>
        <script src='script.js'></script>
      </head>

      <body>
        <header>
          <div id="header-bg"></div>
          <div id="company-name">Lunardo</div>
        </header>
  HEADER;
}
//-------------------------------------------------------------------------------------

//function to return date time now
function now() {
  date_default_timezone_set("Australia/Sydney"); 
  return date("d-m-Y H:i");
}
//-------------------------------------------------------------------------------------

// This function cycles through the array of movies and outputs html code to populate the 'Now Showing' section.
function nowShowingMovies() {

  global $movies;

  foreach ($movies as $movie) {
    
    echo <<<"CDATA"
      <div class="movie-single">
            <div class="movie-detail">
              <div class="movie-title"> {$movie["title"]} </div>
              <div class="movie-runtime"> {$movie["runtime"]} </div>
              <div class="movie-rating"> {$movie["rating"]} </div>
            </div>
            <div class="flip-card-container">
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="card-front">
                    <img src= {$movie["poster"]} alt= {$movie["title"]} >
                  </div>
                  <div class="card-back">
                    <p>{$movie["synopsis"]}</p>
                    <table id="booknow-table">
                      <tr>
                        <th colspan ="2"> Session Times </th>
                      </tr>
    CDATA;          
    foreach ($movie["screenings"] as $day => $time) {
      echo <<<"SCREENINGTABLE"
      <tr>
        <th>$day</th>
        <td>$time</td>
      </tr>
      SCREENINGTABLE;
    }                

    echo <<<"MOREDATA"
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie={$movie['code']}">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    MOREDATA;
  } 
}
//-------------------------------------------------------------------------------------

// used with debugger module to print page code
function printMyCode() {

  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>"; 
  foreach($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" .rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}
//-------------------------------------------------------------------------------------


//appends successful booking to file $var1. For this it's booking.php
function printToFile($var1, $POST) {

  global $movies;

  $currentSelection = $movies[$POST['movie']];

  $printdata = [];

  // adding order date to printout array
  $orderDate = now();
  array_push($printdata, $orderDate);

  $totalPrice = (float) 0;

  foreach ($POST['user'] as $customerDetail) {
    // adding order user details
    array_push($printdata, $customerDetail);
  }

  // adding movie code
  $movieCode = $POST['movie'];
  array_push($printdata, $movieCode);

  // adding movie date
  $movieDate = $POST['day'];
  array_push($printdata, $movieDate);

  $movieTime =getSessionTime($POST);
  $priceType = getPriceType($movieDate, $movieTime);

  foreach ($POST['seats'] as $seat => $value) {

    if(empty($value)) {
      $amount = '0';
    } else {
      $amount = $value;
    }

    // add number of tickets
    array_push($printdata, $amount);
    
    $seatSubtotal = getSeatSubtotal($seat,$amount,$priceType);
    $totalPrice += (float)$seatSubtotal;

    // add ticket subtotal to printer string
    $subtotal = "$" . format($seatSubtotal);
    array_push($printdata, $subtotal);

  }

  // adding total 
  $total = "$" . format($totalPrice);
  array_push($printdata, $total);

  // calculating and adding GST
  $GST = "$".format($totalPrice/11);
  array_push($printdata, $GST);

  //print_r($printdata);


  // opens file to 'append'
  $file = fopen($var1,"a");

  fputcsv($file, $printdata);
  
  
  fclose($file);
}
//-------------------------------------------------------------------------------------


// Session Selection radio menu
function sessionSelection($var) {

  global $movies;
  global $pricing;
  
  $radioState = '';
  $counter = 1;

  foreach ($movies as $movie) {

    if ($movie["code"] === $var) {
      foreach ($movie["screenings"] as $day => $time) {

        // sets discount or full price based on values of MON and 12pm any day
        if ($day == "Mon" || $time == "12pm") {
          $pricing = "data-discprice";
        } else {
          $pricing = "data-fullprice";
        }

        // disables radio if no session time  = "-"
        // if ($time == "-") {
        //   $radioState = "disabled";
        // } 

        $checkedState = setChecked($_POST['day'], $day);
    
        echo <<<"SESSIONSELECTION"
              <li>
                <input type="radio" name="day" value="$day" data-pricing="$pricing" onclick='sessionSelected("$pricing")' $checkedState $radioState required >    
                    <label id="label$counter">
                  <div>$day</div>
                  <hr>
                  <div>$time</div>
                </label> 
              </li>
        SESSIONSELECTION;
        $counter++;
      }
    }
  }
}
//-------------------------------------------------------------------------------------

//function for radio button 'checked' state memory
function setChecked (&$str, $val) {
  return ( isset($str) && $str == $val ? 'checked' : '' ); 
}
//-------------------------------------------------------------------------------------

// function for ticket selection drop down list memory
function setSelected (&$str, $val) {
  return ( isset($str) && $str == $val ? 'selected' : '' ); 
}
//-------------------------------------------------------------------------------------


// Pricing Table data 
function tableData($var) {
  global $seating;

  if (isset($seating[$var])) {
    
    echo <<<"TDATA"
      <td>{$seating[$var]['fullprice']}</td>
      <td>{$seating[$var]['discprice']}</td>
    TDATA;
  } else {
    echo "error with seatCode Parameter";
  }
}
//-------------------------------------------------------------------------------------

// function to generate ticket selection via drop down menu
function ticketTable() {

  global $seating;
  $maxPurchase = 10;

  foreach ($seating as $seat) {

    echo <<<"TICKETSELECTP1"
              <tr>
                <th><label for="seats[{$seat['code']}]">{$seat['desc']} </label></th>
                <td><div id="price[{$seat['code']}]"></div></td>
                <td class="priceCell">
                  <select name="seats[{$seat['code']}]" data-fullprice="{$seat['fullprice']}" data-discprice="{$seat['discprice']}" onchange='calculateTotals()'>
                    <option value="" ></option>
  TICKETSELECTP1;   
                    for ($a=1; $a<=$maxPurchase; $a++) {

                      $selectedState = setSelected($_POST['seats'][$seat['code']], $a);

                      echo "<option value='$a' $selectedState >$a</option><br>";
                    }
    echo <<<"TICKETSELECTP2"

                    </select>
                  </td>
                  <td><div id="pricesubtotal[{$seat['code']}]"></div></td>
                </tr>
    TICKETSELECTP2;       
  }
}
//-------------------------------------------------------------------------------------

function unsetFB (&$str, $fallback = '') {
  return ( isset($str) ? $str : $fallback );
}
//-------------------------------------------------------------------------------------

function yourDetailsTr() {

  $rowData = [
    '1' => ["name", "Full Name", "John Smith", "[a-zA-Z-' ]{2,}"],
    '2' => ["email", "Email", "JSmith@gmail.com", "[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"],
    '3' => ["mobile", "Number", "04XXXXXXXX", "(\(04\)|04|\+614)( ?\d){8}"]
  ];

  foreach ($rowData as $data) {

  $value = unsetFB($_POST['user'][$data[0]]);
  $errormsg = unsetFB($errorsOut['user'][$data[0]]);
  
  $type = 'text';
  if ($data[0] == 'email') {
    $type = 'email';
  }


  echo <<<"STR"
      <tr id="details-tr-{$data[0]}">
        <th><div class="details-info" id="details-{$data[0]}"><img src="../../media/info-icon.png" onmouseover="showDetailsInfo('{$data[0]}')" onmouseout="hideDetailsInfo('{$data[0]}')" ><label for="user[{$data[0]}]">{$data[1]}:</label></div></th>
        <td>
          <input type="{$type}" name="user[{$data[0]}]" value='$value' placeholder='{$data[2]}' onclick="removeDetailsError('{$data[0]}')" required>
          <div id="details-error-{$data[0]}"> $errormsg </div>
        </td>
      </tr>
  STR;          
  }
}  
//-------------------------------------------------------------------------------------           


// post/get request validation. user sent to index if invalid 
function validateRequest($requestTypeValue) {
  global $movies;
  if (!isset($movies[$requestTypeValue]) ) {
    header("Location: error.php");
    exit();
  }
}
//-------------------------------------------------------------------------------------   

// 3. Testing Zone - for functions used in test code.

// test module to generate sliding descriptions for Prices-seats images/description
// not completely coded for responsive display so using a sneaky hide/height to switch between original and this test codeblock

function testModule() {

  echo<<<"TEST"
    <div id='test-grid'>
      <div id='floating-text'>
        <p>"Modern Cush for you</p>
        <p>precious tush"</p>
      </div>
      <div id ='box1'>
        <div id='test-container'>
          <div class="test-img" >
            <img id='test-img1' src="../../media/Profern-Standard-Twin.png" value='closed' onmouseover="STslideRight()" onmouseout="STslideLeft()" onclick="toggleSlide('ST')">
          </div>
          <div class="test-description">
            <p>The Profurn 9X8 seat is designed with a distinct headrest to improve acoustics and the sound experience without compromising on comfort or aesthetic.</p>
            <p>The 9X8 seat has retractable armrests and includes low level cup holders.</p>
          </div>
          <div class ='aside'><h3> Standard </h3></div> 
        </div>
      </div>

      <div id='box2'>
        <div id='test-container2'>
          <div class="test-img2" >
            <img src="../../media/Profern-Verona-Twin.png" onmouseover="FCslideLeft()"  onmouseout="FCslideRight()" onclick="toggleSlide('FC')">
          </div>
          <div class="test-description2">
            <p>The Verona seat is designed for the ultimate in first class seating with it's plush leather trim and 110 degree recliner function.</p>
            <p>The Verona seat has 110 degree recliner, leg rests and large swivel table.</p>
          </div>
          <div class ='aside2'><h3> First Class </h3></div>
        </div>
      </div>  
    </div>
  TEST;

}

 ?>