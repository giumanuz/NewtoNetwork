$("#loginFormId").submit(function (event) {
    event.preventDefault();
    sendPostServer();
});


function sendPostServer() {
    var data = {
        "username": document.forms["loginForm"]["username"].value,
        "password": document.forms["loginForm"]["password"].value,
    };
    $.ajax({
        type: "POST",
        url: "/script/backLogin.php",
        data: JSON.stringify(data),
        success: function (response) {
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

