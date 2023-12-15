function validateForm() {
    let email = document.getElementById('inputEmail').value;
    let password = document.getElementById('inputHash').value;

    let emailError = document.getElementById('emailError');
    let passwordError = document.getElementById('passwordError');

    emailError.textContent = "";
    passwordError.textContent = "";

    // Expresión regular para validar el formato de email
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        emailError.textContent = "Por favor, ingrese un email válido.";
        return false;
    }

    if (password.trim() === "") {
        passwordError.textContent = "Por favor, ingrese una contraseña.";
        return false;
    }

    return true;
}