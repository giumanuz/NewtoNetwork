
$.get("../navigationBar.html", function(data){
    $("#nav-placeholder").replaceWith(data);
});

function validateForm() {
    const password1 = document.forms["registrationForm"]["password1"].value;
    const password2 = document.forms["registrationForm"]["password2"].value;
    if (password2 !== password1) {
        alert("Le due password non coincidono");
        return false;
    }
    const uppercase = /[A-Z]/;
    const specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    if (password1.length < 8) {
        alert("La password deve essere lunga almeno 8 caratteri")
        return false;
    }

    if (!uppercase.test(password1)) {
        alert("La password deve contenere almeno un carattere maiuscolo")
        return false;
    }

    if (!specialChar.test(password1)) {
        alert("La password deve contenere almeno un carattere speciale")
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
    if (age > 100) {
        alert("Non puoi avere più di 100 anni")
        return false;
    }
    return true;
}