const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
const weekdays = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];

let currentDate = new Date(document.lastModified);

let result = `Last Updated: ${currentDate.getDate()} ${
  months[currentDate.getMonth()]
}, ${currentDate.getFullYear()}`;

document.getElementById("date").innerHTML = result;
