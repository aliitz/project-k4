let numberPersson = sessionStorage.getItem("numberPersson");
let price = sessionStorage.getItem("price");
let dateReserv = sessionStorage.getItem("dateReserv");
let dateExit = sessionStorage.getItem("dateExit");
let nightReserv = sessionStorage.getItem("nightReserv");

console.log(numberPersson);
console.log(price);
console.log(dateReserv);
console.log(nightReserv);

document.getElementById("numberPersson").innerHTML = numberPersson;
document.getElementById("price").innerHTML = price;
document.getElementById("dateReserv").innerHTML = dateReserv;
document.getElementById("dateExit").innerHTML = dateExit;
document.getElementById("numberNight").innerHTML = nightReserv;

// document.addEventListener(
//   "DOMContentLoaded",
//   function () {
//     document.getElementById("numberPersson").innerHTML = numberPersson;
//     document.getElementById("price").innerHTML = price;
//     document.getElementById("dateReserv").innerHTML = dateReserv;
//     document.getElementById("dateExit").innerHTML = dateReserv;
//     document.getElementById("numberNight").innerHTML = nightReserv;
//   },
//   false
// );
