function validateForm() {
    let name = document.getElementById('inputName').value;
    let surname = document.getElementById('inputSurname').value;
    let email = document.getElementById('inputEmail').value;
    let birthday = document.getElementById('inputBirthday').value;
    let nif = document.getElementById('inputNif').value;
    let country = document.getElementById('inputCountry').value;
    let province = document.getElementById('inputProvince').value;
    let city = document.getElementById('inputCity').value;
    let pc = document.getElementById('inputPC').value;
    let address = document.getElementById('inputAddress').value;
    let phoneNumber = document.getElementById('inputPhoneNumber').value;
    let password = document.getElementById('inputHash').value;
    let repeatPassword = document.getElementById('inputRepeatHash').value;

    let nameError = document.getElementById('helpName');
    let surnameError = document.getElementById('helpSurname');
    let emailError = document.getElementById('helpEmail');
    let birthdayError = document.getElementById('helpBirthday');
    let nifError = document.getElementById('helpNif');
    let countryError = document.getElementById('helpCountry');
    let provinceError = document.getElementById('helpProvince');
    let cityError = document.getElementById('helpCity');
    let pcError = document.getElementById('helpPC');
    let addressError = document.getElementById('helpAddress');
    let phoneNumberError = document.getElementById('helpPhoneNumber');
    let passwordError = document.getElementById('helpHash');
    let repeatPasswordError = document.getElementById('helpRepeatHash');

    nameError.textContent = "";
    surnameError.textContent = "";
    emailError.textContent = "";
    birthdayError.textContent = "";
    nifError.textContent = "";
    countryError.textContent = "";
    provinceError.textContent = "";
    cityError.textContent = "";
    pcError.textContent = "";
    addressError.textContent = "";
    phoneNumberError.textContent = "";
    passwordError.textContent = "";
    repeatPasswordError.textContent = "";

    if (name.trim() === "") {
        nameError.textContent = "Por favor, ingrese su nombre.";
        return false;
    }

    if (surname.trim() === "") {
        surnameError.textContent = "Por favor, ingrese su apellido.";
        return false;
    }

    if (email.trim() === "") {
        emailError.textContent = "Por favor, ingrese su email.";
        return false;
    }

    if (birthday.trim() === "") {
        birthdayError.textContent = "Por favor, ingrese su fecha de nacimiento.";
        return false;
    }

    if (nif.trim() === "") {
        nifError.textContent = "Por favor, ingrese su NIF.";
        return false;
    }

    if (country.trim() === "") {
        countryError.textContent = "Por favor, ingrese su país de residencia.";
        return false;
    }

    if (province.trim() === "") {
        provinceError.textContent = "Por favor, ingrese su provincia.";
        return false;
    }

    if (city.trim() === "") {
        cityError.textContent = "Por favor, ingrese su ciudad.";
        return false;
    }

    if (pc.trim() === "") {
        pcError.textContent = "Por favor, ingrese su código postal.";
        return false;
    }

    if (address.trim() === "") {
        addressError.textContent = "Por favor, ingrese su dirección.";
        return false;
    }

    if (phoneNumber.trim() === "") {
        phoneNumberError.textContent = "Por favor, ingrese su número de teléfono.";
        return false;
    }

    if (password.trim() === "") {
        passwordError.textContent = "Por favor, ingrese su contraseña.";
        return false;
    }

    if (repeatPassword.trim() === "" || repeatPassword !== password) {
        repeatPasswordError.textContent = "Las contraseñas no coinciden.";
        return false;
    }

    document.getElementById('form').submit(); // Envía el formulario si todas las validaciones son exitosas
}