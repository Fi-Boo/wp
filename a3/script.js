/* Insert your javascript here */

/*  
function to set 2 different offset values based on media query
Need offset to be -126 for 768px+ res due to larger header/nav otherwise default is -101 for mobile view 
https://www.w3schools.com/howto/howto_js_media_queries.asp 
*/

var x = window.matchMedia("(min-width: 768px)")
myFunction(x)
//x.addEventListener(myFunction)

function myFunction(x) {
    if (x.matches) {
        windowScroll(126);
    } else {
        windowScroll(100);
    }
}


function windowScroll(offsetValue) {
    window.onscroll = function() {
        //console.clear();
        //console.log("Win Y: "+ window.scrollY);
        var navlinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
        //console.log(navlinks);
        var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
        //console.log(sections);
        for (var a = 0; a < sections.length; a++) {
            var sectionTop = sections[a].offsetTop-offsetValue;
            var sectionBot = sections[a].offsetTop + sections[a].offsetHeight-offsetValue;
            //console.log(sectionTop + ' ' + sectionBot);
            if (window.scrollY >= sectionTop && window.scrollY < sectionBot) {
                //console.log(sections[a].id + ": current");
                navlinks[a+1].classList.add("current");
            } else {
                //console.log(sections[a].id + ":");
                navlinks[a+1].classList.remove("current");
            }
        }
    }
}

// Function to display discount or fullprice based on radio menu selection

var seatCodes = [
    'STA',
    'STP',
    'STC',
    'FCA',
    'FCP',
    'FCC'
]

var priceCode;

function displayRadioValue(pricing) {

    priceCode = pricing;

    removeSessionError();
    calculateTotals();

    for (var i=0; i<seatCodes.length; i++) {

        var list = document.getElementsByName("seats["+seatCodes[i]+"]");
        var attribute = list[0].getAttribute(pricing);
        var price = parseFloat(attribute);
        //console.log(price);

        document.getElementById("price["+seatCodes[i]+"]").innerHTML = "$"+ price.toFixed(2);   
    }
}

function updateCost() {
    //console.log(checkSessionBooked());

    if (!checkSessionBooked()) {
        alertSessionError();
    } else {
        calculateTotals();
    }   
}

// function to check if Session time has been selected. Returns a boolean.

function checkSessionBooked() {
    
    var list = document.getElementsByName('day');

    for (var i=0; i< list.length; i ++) {
        if (list[i].checked) {
            return true;
        } 
    }
    return false;
}

//functions to turn on/off session error msg and styling.

function alertSessionError() {
    document.getElementById('session-select-error').style.visibility = 'visible';
    document.getElementById('booking-date').style.border = "5px solid red";
}

function removeSessionError() {
    document.getElementById('session-select-error').style.visibility = 'hidden';
    document.getElementById('booking-date').style.border = "5px solid transparent";
}


function alertTicketError() {
    var list = document.getElementsByClassName('priceCell');
    for (var i = 0; i < list.length; i++) {
        console.log(list[i].style.border);
        list[i].style.border = "2px solid red";
    }
    document.getElementById('tickets-select-error').style.visibility = 'visible';
}

function removeTicketError() {
    var list = document.getElementsByClassName('priceCell');
    for (var i = 0; i < list.length; i++) {
        console.log(list[i].style.border);
        list[i].style.border = "1px solid black";
    }
    document.getElementById('tickets-select-error').style.visibility = 'hidden';
}



// Calculates total of tickets selected

function calculateTotals() {

    var total = parseFloat(0);

    for (var i=0; i <seatCodes.length; i++) {
        var selection = parseFloat(document.getElementsByName("seats[" + seatCodes[i] + "]")[0].value);
        var list = document.getElementsByName("seats[" + seatCodes[i] + "]");
        var ticketPrice = list[0].getAttribute(priceCode);
        var subTotal = selection * parseFloat(ticketPrice).toFixed(2);
        total += subTotal;
        //console.log(total);
        if (subTotal != 0) {
            document.getElementById("pricesubtotal[" + seatCodes[i] +"]").innerHTML = "$" + subTotal.toFixed(2);
            
        } else {
            document.getElementById("pricesubtotal[" + seatCodes[i] +"]").innerHTML = "";   
        }
    }
    if (total != 0) {
        document.getElementById("booking-price-total").innerHTML = "$" + total.toFixed(2);
    } else {
        document.getElementById("booking-price-total").innerHTML = "";
    }
}