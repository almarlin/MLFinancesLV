function validateForm() {
    let concept = document.getElementById('inputConcept').value;
    let quantity = document.getElementById('inputQuantity').value;

    let conceptError = document.getElementById('helpConcept');
    let quantityError = document.getElementById('helpQuantity');

    conceptError.textContent = "";
    quantityError.textContent = "";

    if (concept.trim() === "") {
        conceptError.textContent = "El campo Concepto es obligatorio.";
        return false;
    }

    if (quantity.trim() === "") {
        quantityError.textContent = "El campo Cantidad es obligatorio.";
        return false;
    }

    return true;
}