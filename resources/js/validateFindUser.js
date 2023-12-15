function validateForm() {
    let nif = document.getElementById('inputNif').value;
    let nifError = document.getElementById('helpNif');

    nifError.textContent = "";

    if (nif.trim() === "") {
        nifError.textContent = "Por favor, ingrese un NIF.";
        return false;
    }

    return true;
}