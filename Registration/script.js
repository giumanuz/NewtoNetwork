function validateForm() {
    const password1 = document.forms["registrationForm"]["password1"].value;
    const password2 = document.forms["registrationForm"]["password2"].value;
    if (password2 !== password1) {
        alert("Le due password non coincidono");
        return false;
    }

    const bday = document.forms["registrationForm"]["bday"].value;
    const today = new Date();
    const birthDate = new Date(bday);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    // Check if the age is at least 16
    if (age < 16) {
        alert("Devi avere almeno 16 anni per registrarti")
        return false;
    }
    return true;
}