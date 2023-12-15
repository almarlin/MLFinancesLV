function validateForm() {
    let message = document.getElementById('inputMessage').value;

    let messageError = document.getElementById('helpMessage');

    messageError.textContent = "";

    if (message.trim() === "") {
        messageError.textContent = "Por favor, ingrese un mensaje.";
        return false;
    }

    document.getElementById('form').submit(); // Envía el formulario si todas las validaciones son exitosas
}