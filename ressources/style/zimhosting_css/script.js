/*
*
* Zimhosting CSS framework
*
* @author Emile ZIMMER
*
*/

/*
*
* Responsive navbar burger button script
*
*/

var x = document.getElementById("navdisplay");
const burger = document.querySelector('.burger');


function NavDisplay(){
  if (x.style.display === "block") {
  	x.style.display = "none";
    burger.classList.remove('opened');
  } else {
    x.style.display = "block";
    burger.classList.add('opened');
  }
}