function validateForm() {
    let recipient = document.getElementById('inputEmail').value;
    let concept = document.getElementById('inputConcept').value;
    let quantity = document.getElementById('inputQuantity').value;

    let recipientError = document.getElementById('helpRecipient');
    let conceptError = document.getElementById('helpConcept');
    let quantityError = document.getElementById('helpQuantity');

    recipientError.textContent = "";
    conceptError.textContent = "";
    quantityError.textContent = "";

    if (recipient.trim() === "") {
        recipientError.textContent = "El campo Destinatario es obligatorio.";
        return false;
    }

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