function validateForm() {
    let concept = document.getElementById('inputConcept').value;
    let quantity = document.getElementById('inputQuantity').value;

    let conceptError = document.getElementById('helpConcept');
    let quantityError = document.getElementById('helpQuantity');

    conceptError.textContent = "";
    quantityError.textContent = "";

    if (concept.trim() === "") {
        conceptError.textContent = "Por favor, ingrese el motivo de la solicitud del préstamo.";
        return false;
    }

    if (isNaN(quantity) || quantity <= 0) {
        quantityError.textContent = "Por favor, ingrese una cantidad válida mayor que cero.";
        return false;
    }

    return true;
}