"use strict"

let balances = document.getElementsByClassName("balance");

for (let i = 0; i < balances.length; i++) {

    balances[i].innerHTML = parseInt(balances[i].innerHTML, 16);

}