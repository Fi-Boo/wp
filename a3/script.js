/* Insert your javascript here */

/*  
function to set 2 different offset values based on media query
Need offset to be -126 for 768px+ res due to larger header/nav otherwise default is -101 for mobile view 
https://www.w3schools.com/howto/howto_js_media_queries.asp 
*/

// -- Nav related functions

function navScroll(page) {
  //console.log(page);
  var x = window.matchMedia("(max-width: 767px)");
  myFunction(x);
  x.addEventListener("change", myFunction);

  function myFunction(x) {
    if (x.matches) {
      //console.clear();
      //console.log('small');
      windowScroll(page, "small");
    } else {
      //console.clear();
      //console.log('large');
      windowScroll(page, "large");
    }
  }
}


// Due to my scrollbar being within the parallax-container I had to adapt my code to use the containers scrollTop value instead of window.scrollY
// https://www.javascripttutorial.net/dom/css/get-and-set-scroll-position-of-an-element/

function windowScroll(page, size) {
  var ele = document.getElementById('parallax-container');
  ele.onscroll = function () {
    //console.clear();
    //console.log(page);
    //console.log(size);
    //console.log("Win Y: "+ ele.scrollTop);

    var offsetValue;

    if (page == "index") {
      if (size == "small") {
        offsetValue = 100;
      } else {
        offsetValue = 126;
      }
      //console.log(offsetValue);
      var navlinks = document
        .getElementsByTagName("nav")[0]
        .getElementsByTagName("a");
      //console.log(navlinks);
      var sections = document
        .getElementsByTagName("main")[0]
        .getElementsByTagName("section");
      //console.log(sections);
      for (var a = 0; a < sections.length; a++) {
        var sectionTop = sections[a].offsetTop - offsetValue;
        var sectionBot =
          sections[a].offsetTop + sections[a].offsetHeight - offsetValue;
        //console.log(sectionTop + ' ' + sectionBot);
        if (ele.scrollTop >= sectionTop && ele.scrollTop < sectionBot) {
          //console.log(sections[a].id + ": current");
          navlinks[a + 1].classList.add("current");
        } else {
          //console.log(sections[a].id + ":");
          navlinks[a + 1].classList.remove("current");
        }
      }

      if (ele.scrollTop >= offsetValue) {
        document.querySelector("#logo img").style.opacity = "1";
      } else {
        document.querySelector("#logo img").style.opacity = "0.6";
      }
    } else {
      if (size == "small") {
        offsetValue = 189;
      } else {
        offsetValue = 230;
      }
      //console.log(offsetValue);

      if (ele.scrollTop >= offsetValue) {
        document.querySelector("#logo img").style.opacity = "1";
        document.getElementsByClassName("nav-li")[1].style.backgroundImage =
          "none";
        document.getElementsByClassName("nav-li")[2].style.backgroundImage =
          "none";
        document.getElementsByClassName("nav-li")[0].style.height = "30%";
        if (size == "small") {
          document.getElementsByClassName("nav-li")[0].style.height = "18%";
        }
      } else {
        document.querySelector("#logo img").style.opacity = "0.6";
        document.getElementsByClassName("nav-li")[1].style.backgroundImage =
          "linear-gradient(315deg, transparent 30%, black 80%), linear-gradient(to top, transparent 50%, rgb(125,113,29)), linear-gradient(315deg, #d4af37, #d4af37)";
        document.getElementsByClassName("nav-li")[2].style.backgroundImage =
          "linear-gradient(315deg, transparent 30%, black 80%), linear-gradient(to top, transparent 50%, rgb(125,113,29)), linear-gradient(315deg, #d4af37, #d4af37)";
        if (size == "small") {
          document.getElementsByClassName("nav-li")[0].style.height = "30%";
        }
      }
    }
  };
}

//-------------------------------------------------------------------------------------

// -- Price calculations for booking.php

// function to calculate ticket subtotals.
// Is run at the end of site load to check if pre-existing selections have been made
// Is run upon session selection

function calculateSubTotals() {
  if (document.getElementById("session-select-error").innerHTML !== "") {
    alertChange("session", "visible");
  }

  if (document.getElementById("tickets-select-error").innerHTML !== "") {
    alertChange("tickets", "visible");
  }

  if (document.getElementById("details-error-name").innerHTML !== "") {
    //console.log("something wrong");
    alertChange("name", "visible");
  }

  if (document.getElementById("details-error-email").innerHTML !== "") {
    alertChange("email", "visible");
  }

  if (document.getElementById("details-error-mobile").innerHTML !== "") {
    alertChange("mobile", "visible");
  }

  if (checkSessionSelection()) {
    alertChange("session", "hidden");
    displayRadioValue(checkedSessionPrice);
    calculateTotals();
  }

  if (checkTicketSelected()) {
    alertChange("tickets", "hidden");
    calculateTotals();
  }
 
}


// checks if a ticket is selected. returns true 
function checkTicketSelected() {

  for (var i = 0; i < seatCodes.length; i++) {
    var choice = document.getElementsByName("seats[" + seatCodes[i] + "]")[0].value;
    //console.log(choice);
    if (choice !== "") {
      //console.log('something selected');
      return true;
    }
  }
  return false;
}


// function to check if Session time has been selected. Returns a boolean.
var checkedSessionPrice;

function checkSessionSelection() {
  //console.log("did this work");
  var list = document.getElementsByName("day");

  for (var i = 0; i < list.length; i++) {
    //console.log("testing");
    if (list[i].checked) {
      checkedSessionPrice = list[i].getAttribute("data-pricing");
      //test = checkedSessionPrice.slice(5);
      //console.log(test);
      return true;
    }
  }
  //console.log('nothing checked')
  return false;
}



// clientside validation for session and ticket selection.
// further clientside validation for details could be put in here. Currently using supplied HTML form validation for details component.

function clientSideValidation() {

  var errorCount = 0;

  if (!checkSessionSelection()) {
    document.getElementById("session-select-error").innerHTML = "Please select a session to proceed";
    alertChange("session", "visible");
    errorCount++;
  } 

  if (!checkTicketSelected()) {
    document.getElementById("tickets-select-error").innerHTML = "Please select at least 1 ticket to proceed";
    alertChange("tickets","visible");
    errorCount++;
  }

  console.log(errorCount);
  if (errorCount < 1) {
    document.getElementById("book-tix-btn").disabled = false;
  }
}






// Function to display discount or fullprice based on radio menu selection
var priceCode;

function displayRadioValue(pricing) {
  priceCode = pricing;

  //removeSessionError();
  calculateTotals();

  for (var i = 0; i < seatCodes.length; i++) {
    var list = document.getElementsByName("seats[" + seatCodes[i] + "]");
    var attribute = list[0].getAttribute(pricing);
    var price = parseFloat(attribute);
    //console.log(price);

    document.getElementById("price[" + seatCodes[i] + "]").innerHTML =
      "$" + price.toFixed(2);
  }
}

//function to update Seating Price when a session is selected. Will also remove 'Select Session' alert.
function sessionSelected(pricing) {
  displayRadioValue(pricing);
  alertChange("session", "hidden");
}

// function to show/hide error msg boxes. takes type of error msg and style (visible or hidden)
function alertChange(alert, style) {
  switch (alert) {
    case "session":
      document.getElementById("session-select-error").style.visibility = style;
      break;
    case "tickets":
      document.getElementById("tickets-select-error").style.visibility = style;
      break;
    case "name":
      document.getElementById("details-error-name").style.visibility = style;
      break;
    case "email":
      document.getElementById("details-error-email").style.visibility = style;
      break;
    case "mobile":
      document.getElementById("details-error-mobile").style.visibility = style;
      break;
  }
}

var seatCodes = ["STA", "STP", "STC", "FCA", "FCP", "FCC"];

// Calculates total of tickets selected
function calculateTotals() {
  var total = parseFloat(0);
  var selection;

  if (
    !checkSessionSelection() &&
    document.getElementById("session-select-error") != ""
  ) {
    alertChange("session", "visible");
    document.getElementById("session-select-error").innerHTML =
      "Please select session to view pricing";
  } else {
    //calculates subtotals per ticket type
    for (var i = 0; i < seatCodes.length; i++) {
      var choice = document.getElementsByName("seats[" + seatCodes[i] + "]")[0]
        .value;
      //console.log(choice);
      if (choice == "") {
        selection = parseFloat("0");
      } else {
        selection = parseFloat(choice);
        alertChange("tickets", "hidden");
      }
      // console.log(selection);
      var list = document.getElementsByName("seats[" + seatCodes[i] + "]");
      var ticketPrice = list[0].getAttribute(priceCode);
      var subTotal = selection * parseFloat(ticketPrice).toFixed(2);
      total += subTotal;
      //console.log(total);
      if (subTotal != 0) {
        document.getElementById(
          "pricesubtotal[" + seatCodes[i] + "]"
        ).innerHTML = "$" + subTotal.toFixed(2);
        //console.log("test");
      } else {
        document.getElementById(
          "pricesubtotal[" + seatCodes[i] + "]"
        ).innerHTML = "";
      }
    }
  }

  //calculates final total for all tickets
  if (total != 0) {
    document.getElementById("booking-price-total").innerHTML =
      "$" + total.toFixed(2);
  } else {
    document.getElementById("booking-price-total").innerHTML = "";
  }
}

function removeDetailsError(variable) {
  document.getElementById("details-error-" + variable).style.visibility =
    "hidden";
  document.getElementsByName("user[" + variable + "]")[0].style.border = "none";
}

//-------------------------------------------------------------------------------------

//Mouse/click info icon to display detail field limitations
// Your details info icons

function showDetailsInfo(variable) {
  var msg;

  switch (variable) {
    case "name":
      msg = "First Name and Surname. Min 2 characters";
      break;
    case "email":
      msg = "Email format name@provider.(com/net/org)";
      break;
    case "mobile":
      msg = "10 digit Aus mobile number";
      break;
  }

  document.getElementById("details-error-" + variable).style.visibility =
    "visible";
  document.getElementById("details-error-" + variable).style.boxShadow ="2px 2px #d4af37"; 
  document.getElementById("details-error-" + variable).style.minWidth = "fit-content";
  document.getElementById("details-error-" + variable).style.right = "auto";
  document.getElementById("details-error-" + variable).style.backgroundImage = "url('../../media/info-icon.png')";
  document.getElementById("details-error-" + variable).style.color = "green";
  document.getElementsByName("user[" + variable + "]")[0].style.border =
    "2px solid #d4af37";
  document.getElementById("details-error-" + variable).innerHTML = msg;
}

function hideDetailsInfo(variable) {
  //console.log(variable);
  document.getElementById("details-tr-" + variable).style.backgroundColor =
    "transparent";
  document.getElementById("details-error-" + variable).style.visibility =
    "hidden";
  document.getElementsByName("user[" + variable + "]")[0].style.border = "none";

  // i dont think i need this code at all.
  // document.getElementById("details-error-" + variable).style.boxShadow ="2px 2px red"; 
  // document.getElementById("details-error-" + variable).style.left = "auto";
  // document.getElementById("details-error-" + variable).style.backgroundImage = "url('../../media/error-icon.png')";
}

//press to return to index.html button in error
function errorpress(number) {
  //console.log(number);

  switch (number) {
    case "1":
      document.querySelector(".error1").style.visibility = "hidden";
      document.querySelector(".error2").style.visibility = "visible";
      document.querySelector("#error-tsktsk").innerHTML = "Oops! Try again...";
      break;
    case "2":
      document.querySelector(".error2").style.visibility = "hidden";
      document.querySelector(".error3").style.visibility = "visible";
      document.querySelector("#error-tsktsk").innerHTML =
        "OK OK this time for real...";
      break;
    case "3":
      document.querySelector(".error3").style.visibility = "hidden";
      document.querySelector(".error1").style.visibility = "visible";
      document.querySelector("#error-tsktsk").innerHTML = "";
      return true;
  }
}


// for ST seat open text
function STslideRight() {
  document.querySelector(".std-description").style.width = "400px";
}

// for ST seat close text
function STslideLeft() {
  document.querySelector(".std-description").style.width = "0px";
}

// for FC seat open text
function FCslideLeft() {
  document.querySelector(".fc-description").style.width = "400px";
}

// for FC seat close text
function FCslideRight() {
  document.querySelector(".fc-description").style.width = "0px";
}

function toggleDesc(type, status) {
  var element = "." + type + "-description";

  //https://zellwk.com/blog/css-values-in-js/#:~:text=First%2C%20you%20need%20to%20select,to%20get%20the%20element's%20styles.&text=If%20you%20log%20style%20%2C%20you,property%20and%20their%20respective%20values.&text=You%20can%20also%20see%20this%20object%20in%20Chrome's%20and%20Firefox's%20dev%20tools.
  var width = getComputedStyle(document.querySelector("#prices-seat-grid")).width;

  if (width == "1000px") {
    if (status == "show") {
      //console.log(width);
      document.querySelector(element).style.transition = "1s";
      document.querySelector(element).style.width = "400px";
    } else {
      document.querySelector(element).style.width = "0px";
      document.querySelector(element).style.transition = "none";
    }
  }
}
