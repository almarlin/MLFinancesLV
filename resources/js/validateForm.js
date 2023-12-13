"use strict"

document.addEventListener('DOMContentLoaded', function () {
    var formulario = document.getElementById('form');

    formulario.addEventListener('submit', function (event) {
        if (!formulario.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        formulario.classList.add('was-validated');
    });
});
