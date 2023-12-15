function validateMessageForm() {
    let message = document.getElementById('inputMessage').value;
    let messageError = document.getElementById('messageError');

    messageError.textContent = "";

    if (message.trim() === "") {
        messageError.textContent = "Por favor, ingrese un mensaje.";
        return false;
    }

    return true;
}