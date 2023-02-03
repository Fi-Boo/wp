<?php
  session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

// Function set up in a utilities file like tools.php



// multidimensional associative movie array to store all the movie data for use in 'Now Showing' section and 'Booking.php'

$movies = [
  "ACT" => [
    "code" => "ACT",
    "title" => "Avatar 2: Way of water",
    "runtime" => "3h 12m",
    "rating" => "PG-13",
    "poster" => "../../media/Avatar2.jpg",
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
    "fullprice" => "21.5",
    "discount" => "16"
  ],
  "STP" => [
    "code" => "STP",
    "desc" => "Standard Concession",
    "fullprice" => "19",
    "discount" => "14.5"
  ],
  "STC" => [
    "code" => "STC",
    "desc" => "Standard Child",
    "fullprice" => "17.5",
    "discount" => "13"
  ],
  "FCA" => [
    "code" => "FCA",
    "desc" => "First Class Adult",
    "fullprice" => "31.5",
    "discount" => "25"
  ],
  "FCP" => [
    "code" => "FCP",
    "desc" => "First Class Concession",
    "fullprice" => "28",
    "discount" => "23.5"
  ],
  "FCC" => [
    "code" => "FCC",
    "desc" => "First Class Child",
    "fullprice" => "25",
    "discount" => "22"
  ]
];
   

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
                      <a href="booking.php?movie={$movie["code"]}">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    MOREDATA;
  } 
}

// Session Selection radio menu

function sessionSelection($var) {

  global $movies;

  $pricing;
  $radioState;
  $counter = 1;

  foreach ($movies as $movie) {

    if ($movie["code"] === $var) {
      foreach ($movie["screenings"] as $day => $time) {
        echo <<<"SESSIONSELECTION"
              <li>
                <input type="radio" name="day" value="$day" setChecked({$_POST['day']},'$day') data-pricing="
        SESSIONSELECTION;
        
        if ($day == "Mon" || $time == "12pm") {
          $pricing = "data-discprice";
        } else {
          $pricing = "data-fullprice";
        }

        if ($time == "-") {
          $radioState = "disabled";
        } else {
          $radioState = "";
        }

        echo <<<"SESSIONSELECTIONP2"
                $pricing" onclick='displayRadioValue("$pricing")' {$radioState} >
                <label id="label$counter">
                  <div>$day</div>
                  <hr>
                  <div>$time</div>
                </label> 
              </li>
        SESSIONSELECTIONP2;
      
        $counter++;
      }
    }
  }
}

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
                  <select name="seats[{$seat['code']}]" data-fullprice="{$seat['fullprice']}" data-discprice="{$seat['discount']}" onchange='calculateSubTotals()'>
                    <option value="" ></option>
  TICKETSELECTP1;   
                    for ($a=1; $a<=$maxPurchase; $a++) {
                    echo "<option value='$a' >$a</option><br>";
                    }
    echo <<<"TICKETSELECTP2"

                    </select>
                  </td>
                  <td><div id="pricesubtotal[{$seat['code']}]"></div></td>
                </tr>
    TICKETSELECTP2;       
  }
}

function yourDetailsTr() {

  $rowData = [
    '1' => ["name", "Full Name", "John Smith"],
    '2' => ["email", "Email", "JSmith@gmail.com"],
    '3' => ["mobile", "Number", "04XXXXXXXX"]
  ];

  foreach ($rowData as $data) {
    echo <<<"DETAILSTR"
                  <tr id="details-tr-{$data[0]}">
                    <th><div class="details-info" id="details-{$data[0]}"><img src="../../media/info-icon.png" onmouseover="alertDetailsInfo('{$data[0]}')" onmouseout="hideDetailsInfo('{$data[0]}')">{$data[1]}:</div></th>
                    <td><input type="text" name="user[{$data[0]}]" placeholder="{$data[2]}" onclick=removeDetailsError("{$data[0]}") ></td>
                  </tr>
    DETAILSTR;
  }
}

// HEADER CODE

function headerModule() {
  echo <<<"HEADER"
    <!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lunardo Cinema Home Page</title>

        <!-- Keep wireframe.css for debugging, add your css to style.css -->
        <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
        <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t={
  HEADER;
  filemtime('style.css');
  echo <<<"HEADERP2"
  
  ">
        <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
        <script src='../wireframe.js'></script>
        <script src='script.js'></script>
      </head>

      <body>
        <header>
          <div id="header-bg"></div>
          <div id="company-name">Lunardo</div>
        </header>
  HEADERP2;
}



// FOOTER CODE

function footerModule() {
  echo <<<"FOOTERP1"
  <footer>
      <div>&copy;<script>document.write(new Date().getFullYear());</script> 
      Phi Van Bui, s2008156D Group A. Last modified 
  FOOTERP1;
  footerDate(); 
  echo <<<"FOOTERP2"
  .</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
  FOOTERP2;
  
}

function footerDate() {
  $testdate = date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME']));
  echo "$testdate";
}


// DEBUGGING CODE

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

function printMyCode() {

  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>"; 
  foreach($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" .rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}

 ?>