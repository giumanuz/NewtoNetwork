$("#registrationFormId").submit(function (event) {
    event.preventDefault();
    validateForm();
});

function validateForm() {
    const password1 = document.forms["registrationForm"]["password1"].value;
    const password2 = document.forms["registrationForm"]["password2"].value;


    if (password2 !== password1) {
        showAlertWithError("Passwords do not match, try again.");
        return false;
    }
    const uppercase = /[A-Z]/;
    const specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    if (password1.length < 8) {
        showAlertWithError("Password must be at least 8 characters long.");
        return false;
    }

    if (!uppercase.test(password1)) {
        showAlertWithError("Password must contain at least one uppercase letter.");
        return false;
    }

    if (!specialChar.test(password1)) {
        showAlertWithError("Password must contain at least one special character.");
        return false;
    }

    const bday = document.forms["registrationForm"]["bday"].value;
    const [year, month, day] = bday.split("-");
    const birthdate = new Date(year, month - 1, day);
    const ageInYears = (new Date() - birthdate) / (365 * 24 * 60 * 60 * 1000);
    if (ageInYears < 18) {
        showAlertWithError("You must be at least 16 years old to register.");
        return false;
    }

    // take photo from input
    
    validateServerSide();

    return false; 


}
function validateServerSide() {
    var reader = new FileReader();
    var file = document.forms["registrationForm"]["photo"].files[0];
    reader.onloadend = function () {
        var dataUrl = reader.result;
        var extension = dataUrl.split(';')[0].split('/')[1];
        var photo = dataUrl.split(',')[1];

        sendPostServer(photo, extension);
    };
    if (file)
        reader.readAsDataURL(file);

    else {
        sendPostServer('', '');
    }

}
function sendPostServer(photo, extension) {
    var data = {
        "username": document.forms["registrationForm"]["username"].value,
        "password": document.forms["registrationForm"]["password1"].value,
        "email": document.forms["registrationForm"]["email"].value,
        "bday": document.forms["registrationForm"]["bday"].value,
        "name": document.forms["registrationForm"]["name"].value,
        "surname": document.forms["registrationForm"]["surname"].value,
        "photo": photo,
        "extension": extension
    };

    $.ajax({
        url: "/script/backRegistration.php",
        type: "POST",
        data: JSON.stringify(data),
        success: function (response) {
            console.log(response);
            if (response === "success") {
                window.location.href = "/index.php";
            } else {
                showAlertWithError(response);
            }
        },
    });
}
function showAlertWithError(errorText) {
    $("#errorAlertText").html(errorText);
    $("#errorAlert").addClass('show');
}
