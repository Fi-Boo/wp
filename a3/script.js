/* Insert your javascript here */

/*  
function to set 2 different offset values based on media query
Need offset to be -126 for 768px+ res due to larger header/nav otherwise default is -101 for mobile view 
https://www.w3schools.com/howto/howto_js_media_queries.asp 
*/

function navScroll() {

var x = window.matchMedia("(min-width: 768px)");
myFunction(x);
x.addEventListener(myFunction);

function myFunction(x) {
    if (x.matches) {
        windowScroll(126);
    } else {
        windowScroll(100);
    }
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


function testFunction() {

    window.onscroll = function() {
        console.clear();
        console.log("Win Y: "+ window.scrollY);
        if (window.scrollY >= 199) {
            document.querySelector('#logo img').style.opacity = '1';
            document.querySelector('#movie-detail').style.textAlign = 'right';
            document.querySelector('#movie-detail').style.gridTemplateAreas = "'. title title title''. . runtime rating'";
            document.querySelector('#movie-detail').style.backgroundImage = "linear-gradient(to left, #d4af37 25%, transparent 80%)";
            document.querySelector('.movie-title').style.paddingRight = '1rem';
            document.getElementsByClassName('nav-li')[0].style.backgroundImage = 'none';
            document.getElementsByClassName('nav-li')[1].style.backgroundImage = 'none';
            document.getElementsByClassName('nav-li')[2].style.backgroundImage = 'none';

            // document.querySelector('.nav-li')[2].style.backgroundImage = 'linear-gradient(315deg, #d4af37, transparent 20%)';


        } else {
            document.querySelector('#logo img').style.opacity = '0.6';
            document.querySelector('#movie-detail').style.textAlign = 'center';  
            document.querySelector('#movie-detail').style.gridTemplateAreas = "'title title title title''.  runtime rating .'";
            document.querySelector('#movie-detail').style.backgroundImage = "linear-gradient(to left, transparent, #d4af37 30%, #d4af37 70%, transparent)";
            document.querySelector('.movie-title').style.paddingRight = '0';
            document.getElementsByClassName('nav-li')[0].style.backgroundImage = 'linear-gradient(315deg, #d4af37 30%, black 80%)';
            document.getElementsByClassName('nav-li')[1].style.backgroundImage = 'linear-gradient(315deg, #d4af37 30%, black 80%)';
            document.getElementsByClassName('nav-li')[2].style.backgroundImage = 'linear-gradient(315deg, #d4af37 30%, black 80%)';
            // document.querySelector('#navbar li').style.backgroundImage = 'linear-gradient(315deg, #d4af37 30%, black 80%)';
        }
    }
}        
//             document.getElementById('company-name-alt').style.opacity = '1';
//             document.getElementById('company-name-alt').style.transition = '1s';
//         }
//     }
// }

// function testFunction2() {
//     document.getElementById('company-name-alt').style.opacity = '0';
//     document.getElementById('company-name-alt').style.transition = '0.5s';
// }

// function navScroll2() {

//     window.onscroll = function() {

//         if (window.scrollY >= 112) {
//             testFunction();
//         } else {
//             document.getElementById('company-name-alt').style.visibility = 'hidden';
//             document.getElementById('company-name-alt').style.transition = '0';
//             document.getElementById('company-name').style.visibility = 'visible';
//         }
//     }
// }




// Function to display discount or fullprice based on radio menu selection


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


// function to calculate ticket subtotals. Triggers when user selects a # of tickets from dropdown list.

function calculateSubTotals() {
    //console.log(checkSessionBooked());
    removeTicketError();

    if (!checkSessionSelection()) {
        alertSessionError();
    } else {
        calculateTotals();
        checkTicketSelection();
    }   
}

// function to check if Session time has been selected. Returns a boolean.

function checkSessionSelection() {

    var list = document.getElementsByName('day');

    for (var i=0; i< list.length; i ++) {
        if (list[i].checked) {
            return true;
        } 
    }
    return false;
}

// function to validate ticket selection. Returns a boolean.

function checkTicketSelection() {

    for (var i = 0; i < seatCodes.length; i++) {
        var selection = parseInt(document.getElementsByName("seats[" + seatCodes[i] + "]")[0].value);
        //console.log(selection);
        if (selection > 0) {
            return true;
        }
    }
    return false;
}


// onsubmit form validation.
//regex https://www.w3resource.com/javascript/form/email-validation.php#:~:text=To%20get%20a%20valid%20email,%5D%2B)*%24%2F.


function validateForm() {

    var valid;

    if (!checkSessionSelection()) {
        alertSessionError();
        valid = false;
    }
    
    if (!checkTicketSelection()) {
        alertTicketError()
        valid = false
    }

    if (checkSessionSelection() && checkTicketSelection()) {
        valid = true;
    } 
     
    var nameRegex = /^[a-zA-Z-' ]*$/;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var mobileRegex= /^(\(04\)|04|\+614)( ?\d){8}$/;

    var name = document.getElementsByName("user[name]")[0].value;
    var email = document.getElementsByName("user[email]")[0].value;
    var mobile = document.getElementsByName("user[mobile]")[0].value;
    console.log(name);

    if (nameRegex.test(name) == false) {
        alertDetailsError('name');
        valid = false;
    }

    if (emailRegex.test(email) == false) {
        alertDetailsError('email');
        valid = false;
    }

    if (mobileRegex.test(mobile) == false) {
        alertDetailsError('mobile');
        valid = false;
    }



    
    return valid;
    
}



// functions to turn on/off session error msg and styling.

function alertSessionError() {
    document.getElementById('session-select-error').style.visibility = 'visible';
    document.getElementById('booking-date').style.border = "5px solid red";
}

function removeSessionError() {
    document.getElementById('session-select-error').style.visibility = 'hidden';
    document.getElementById('booking-date').style.border = "5px solid transparent";
}


// functions to turn on/off ticket selection error msg and styling

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


// Mouse/click info icon to display detail field limitations

function alertDetailsInfo(variable) {

    var msg;

    switch(variable) {
        case 'name':
            msg = "Just First Name and Surname.";
            break;
        case 'email':
            msg = "Standard email format name@provider.(com/net/org)";
            break;
        case 'mobile':
            msg = "10 digit Aus mobile number in format 04xxxxxxxx";
            break;
    }

    document.getElementById('details-error').style.visibility = 'visible';
    document.getElementsByName('user[' + variable +']')[0].style.border = '2px solid #d4af37';
    document.getElementById('details-error').style.backgroundImage = 'url("../../media/info-icon.png")';
    document.getElementById('details-error').innerHTML = msg;
}

function hideDetailsInfo(variable) {
    document.getElementById('details-tr-' + variable).style.backgroundColor = 'transparent';
    document.getElementById('details-error').style.visibility = 'hidden';
    document.getElementsByName('user[' + variable +']')[0].style.border = 'none';
}


// function to turn on/off 'Your Details' error msg

function alertDetailsError(variable) {
    document.getElementById('details-error').style.backgroundImage = 'url("../../media/error-icon.png")';
    document.getElementById('details-error').innerHTML = 'Missing or incorrect input. See field <img src="../../media/info-icon.png"> for more info';
    document.getElementById('details-error').style.visibility = 'visible';
    document.getElementsByName('user[' + variable +']')[0].style.border = '2px solid red';
}

function removeDetailsError(variable) {
    document.getElementById('details-error').style.visibility = 'hidden';
    document.getElementsByName('user[' + variable +']')[0].style.border = 'none';
}







var seatCodes = [
    'STA',
    'STP',
    'STC',
    'FCA',
    'FCP',
    'FCC'
]

// Calculates total of tickets selected

function calculateTotals() {

    var total = parseFloat(0);


    //calculates subtotals per ticket type
    for (var i=0; i <seatCodes.length; i++) {
        var choice = document.getElementsByName("seats[" + seatCodes[i] + "]")[0].value;
        //console.log(choice);
        if (choice == "") {
            selection = parseFloat('0');
        } else {
            selection = parseFloat(choice);
        }
        // console.log(selection);
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

    //calculates final total for all tickets
    if (total != 0) {
        document.getElementById("booking-price-total").innerHTML = "$" + total.toFixed(2);
    } else {
        document.getElementById("booking-price-total").innerHTML = "";
    }
}