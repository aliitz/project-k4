const urlImage = [
  "../image/hotel-bell_1203-2898.webp",
  "../image/3d-rendering-vintage-minimal-bedroom-suite-hotel-with-tv_105762-2161.jpg",
  "../image/bright-kitchen-design_305343-7802.jpg",
  "../image/modern-luxury-hotel-office-reception-lounge-with-meeting-room_105762-1772.webp",
];
document.getElementById("image-slider").src = urlImage[0];
let counter = 1;
setInterval(() => {
  document.getElementById("image-slider").src = urlImage[counter];
  counter === urlImage.length - 1 ? (counter = 0) : counter++;
}, 10000);

const day = [
  1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
  23, 24, 25, 26, 27, 28, 29, 30, 31,
];
const month = [
  "فروردین",
  "اردیبهشت",
  "خرداد",
  "تیر",
  "مرداد",
  "شهریور",
  "مهر",
  "ابان",
  "آذز",
  "دی",
  "بهمن",
  "اسفند",
];

day.map((item) => {
  const node = document.createElement("option");

  // Create a text node:
  const textnode = document.createTextNode(item);

  // Append the text node to the "li" node:
  node.appendChild(textnode);

  // Append the "li" node to the list:
  document.getElementById("day").appendChild(node);
});
month.map((item) => {
  const node = document.createElement("option");

  // Create a text node:
  const textnode = document.createTextNode(item);

  // Append the text node to the "li" node:
  node.appendChild(textnode);

  // Append the "li" node to the list:
  document.getElementById("month").appendChild(node);
});

let numberPersson, price, dateReserv, nightReserv, dateExit;
const btnReservClickHandler = () => {
  window.open("../html/reserve.html", "_self");
  // console.log(numberPersson, price, dateReserv, nightReserv);
};

const btnExistClickHandler = () => {
  let v = document.getElementById("night").value;
  // console.log(v);
  // console.log(document.getElementById("optionHotel").value);
  // console.log(document.getElementById("day").value);
  // console.log(document.getElementById("month").value);
  // console.log(document.getElementById("year").value);
  // console.log(document.getElementById("night").value);
  if (
    document.getElementById("optionHotel").value === "" ||
    document.getElementById("day").value === "" ||
    document.getElementById("month").value === "" ||
    document.getElementById("year").value === "" ||
    document.getElementById("night").value === ""
  ) {
    alert("لطفا تمام موارد را انتخاب کنید");
  }
  if (
    (document.getElementById("month").value === "مهر" ||
      document.getElementById("month").value === "ابان" ||
      document.getElementById("month").value === "آذر" ||
      document.getElementById("month").value === "دی" ||
      document.getElementById("month").value === "بهمن") &&
    document.getElementById("day").value == 31
  ) {
    alert("تاریخ وارد شده نادرست است");
  }
  if (
    document.getElementById("month").value === "اسفند" &&
    document.getElementById("day").value >= 30
  ) {
    alert("تاریخ وارد شده نادرست است");
  }
};

///// move detail room in page reserv

var listroom = document.querySelector("div.room-exist");
listroom.addEventListener(
  "click",
  (event) => {
    if (event.target.tagName == "BUTTON") {
      let divListRoom = event.target.parentElement;
      numberPersson = divListRoom.children[0].innerHTML;
      price = divListRoom.children[2].innerHTML;
      // console.log(numberPersson);
      // console.log(price);
      let dayReserv = document.getElementById("day").value;
      let monthReserv = document.getElementById("month").value;
      let yearReserv = document.getElementById("year").value;
      nightReserv = document.getElementById("night").value;
      let numbermonth;
      for (let index = 0; index < month.length; index++) {
        if (month[index] === monthReserv) {
          numbermonth = index + 1;
        }
      }
      dateReserv = yearReserv + "/" + numbermonth + "/" + dayReserv;
      if (Number(dayReserv) + Number(nightReserv) > 31 && numbermonth < 7) {
        dateExit =
          yearReserv +
          "/" +
          (numbermonth + 1) +
          "/" +
          (Number(dayReserv) + Number(nightReserv) - 31);
      } else if (
        Number(dayReserv) + Number(nightReserv) > 30 &&
        numbermonth > 6
      ) {
        dateExit =
          yearReserv +
          "/" +
          (numbermonth + 1) +
          "/" +
          (Number(dayReserv) + Number(nightReserv) - 30);
        if (numbermonth + 1 > 12) {
          dateExit =
            Number(yearReserv) +
            1 +
            "/" +
            1 +
            "/" +
            (Number(dayReserv) + Number(nightReserv) - 30);
        }
      } else {
        dateExit =
          yearReserv +
          "/" +
          numbermonth +
          "/" +
          (Number(dayReserv) + Number(nightReserv));
      }

      console.log(dateExit);
      sessionStorage.setItem("numberPersson", numberPersson);
      sessionStorage.setItem("price", price);
      sessionStorage.setItem("dateReserv", dateReserv);
      sessionStorage.setItem("dateExit", dateExit);
      sessionStorage.setItem("nightReserv", nightReserv);

      btnReservClickHandler();
      // console.log(yearReserv + "/" + numbermonth + "/" + dayReserv);
    }
  },
  false
);

// let personName = sessionStorage.getItem("lastname");
// document.getElementById("numberPersson").value == numberPersson;
// document.getElementById("price").value == price;
// document.getElementById("dateReserv").value == dateReserv;
// document.getElementById("dateExit").value == dateReserv;
// document.getElementById("numberNight").value == nightReserv;
// export default { numberPersson };
// export { price };
// export { dateReserv };
// export { nightReserv };
// export { numberPersson};
