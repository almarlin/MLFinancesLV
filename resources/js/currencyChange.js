"use strict";


const balanceElement = document.getElementById('balance');
let balance = parseFloat(balanceElement.innerHTML);
localStorage.setItem('euroBalance', balance);

changeCurrency(localStorage.getItem('currentCurrency') || 'euro');


function changeCurrency(newCurrency) {
    
    let balance = localStorage.getItem('euroBalance');
    const currencyValues = { 'euro': 1, 'dollar': 1.1, 'pound': 0.9, 'yen': 160, 'ruble': 95 }; 

    // Convertir el balance a la nueva moneda
    balance = balance * currencyValues[newCurrency];

    // Actualizar la moneda actual en localStorage
    localStorage.setItem('currentCurrency', newCurrency);

    // Actualizar el elemento HTML con el nuevo balance
    balanceElement.innerHTML = balance.toFixed(2);
}






