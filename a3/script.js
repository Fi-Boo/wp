/* Insert your javascript here */

/*  
function to set 2 different offset values based on media query
Need offset to be -126 for 768px+ res due to larger header/nav otherwise default is -101 for mobile view 
https://www.w3schools.com/howto/howto_js_media_queries.asp 
*/

var x = window.matchMedia("(min-width: 768px)")
myFunction(x)
x.addEventListener(myFunction)

function myFunction(x) {
    if (x.matches) {
        window.onscroll = function() {
            console.clear();
            console.log("Win Y: "+ window.scrollY);
            var navlinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
            console.log(navlinks);
            var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
            console.log(sections);
            for (var a = 0; a < sections.length; a++) {
                var sectionTop = sections[a].offsetTop-126;
                var sectionBot = sections[a].offsetTop + sections[a].offsetHeight-126;
                console.log(sectionTop + ' ' + sectionBot);
                if (window.scrollY >= sectionTop && window.scrollY < sectionBot) {
                    console.log(sections[a].id + ": current");
                    navlinks[a+1].classList.add("current");
                } else {
                    console.log(sections[a].id + ":");
                    navlinks[a+1].classList.remove("current");
                }
            }
        }
    } else {
        window.onscroll = function() {
            console.clear();
            console.log("Win Y: "+ window.scrollY);
            var navlinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
            console.log(navlinks);
            var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
            console.log(sections);
            for (var a = 0; a < sections.length; a++) {
                var sectionTop = sections[a].offsetTop-101;
                var sectionBot = sections[a].offsetTop + sections[a].offsetHeight-101;
                console.log(sectionTop + ' ' + sectionBot);
                if (window.scrollY >= sectionTop && window.scrollY < sectionBot) {
                    console.log(sections[a].id + ": current");
                    navlinks[a+1].classList.add("current");
                } else {
                    console.log(sections[a].id + ":");
                    navlinks[a+1].classList.remove("current");
                }
            }
        }
    }
}



