function validateForm() {
    let nif = document.getElementById('inputNif').value;
    let userStateBan = document.getElementById('banUser').checked;
    let userStateUnban = document.getElementById('unbanUser').checked;
    let helpIdError = document.getElementById('helpId');
    let userStateError = document.getElementById('userStateError');

    helpIdError.textContent = "";
    userStateError.textContent = "";

    if (nif.trim() === "") {
        helpIdError.textContent = "Por favor, ingrese un NIF.";
        return false;
    }

    if (!userStateBan && !userStateUnban) {
        userStateError.textContent = "Por favor, seleccione Bloquear usuario o Desbloquear usuario.";
        return false;
    }

    return true;
}