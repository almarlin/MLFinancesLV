"use strict";

let date = new Date();

document.getElementById("date1").innerHTML = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();

let weekDay = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
let day = weekDay[date.getDay()];


let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
let monthName = months[date.getMonth()];

document.getElementById("dayName").innerHTML += day + " " + date.getDate() + " de " + monthName;