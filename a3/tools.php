<?php
  session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/

// Function set up in a utilities file like tools.php


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
                    <cite><strong>Session Times</strong></cite>
                    <table>
                      <tr>
                        <th>Mon</th>
                        <td> {$movie["screenings"]["Mon"]} </td>
                      </tr>
                      <tr>
                        <th>Tue</th>
                        <td> {$movie["screenings"]["Tue"]} </td>
                      </tr>
                      <tr>
                        <th>Wed</th>
                        <td> {$movie["screenings"]["Wed"]} </td>
                      </tr>
                      <tr>
                        <th>Thu</th>
                        <td> {$movie["screenings"]["Thu"]} </td>
                      </tr>
                      <tr>
                        <th>Fri</th>
                        <td> {$movie["screenings"]["Fri"]} </td>
                      </tr>
                      <tr>
                        <th>Sat</th>
                        <td> {$movie["screenings"]["Sat"]} </td>
                      </tr>
                      <tr>
                        <th>Sun</th>
                        <td> {$movie["screenings"]["Sun"]} </td>
                      </tr>
                    
                    </table>
                    <div class="booknow">
                      <a href="booking.php?movie={$movie["code"]}">BOOK NOW</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    CDATA;
  } 
}
