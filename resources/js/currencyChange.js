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
    let pulsedCurrencyButton = document.getElementById(newCurrency);
    pulsedCurrencyButton.classList.remove("btn-currency");
    pulsedCurrencyButton.classList.add("btn-currency-pulsed");

    
    if (document.getElementById(localStorage.getItem('currentCurrency'))) {
        let oldCurrencyButton = document.getElementById(localStorage.getItem('currentCurrency'));
        oldCurrencyButton.classList.remove("btn-currency-pulsed");
        oldCurrencyButton.classList.add("btn-currency");
    }

    // Actualizar la moneda actual en localStorage
    localStorage.setItem('currentCurrency', newCurrency);

    // Actualizar el elemento HTML con el nuevo balance
    balanceElement.innerHTML = balance.toFixed(2);
}






