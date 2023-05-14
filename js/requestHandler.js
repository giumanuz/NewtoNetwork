
document.querySelectorAll('.btn-accept').forEach(button => {
    button.addEventListener('click', function(event) {
        let username = this.getAttribute('data-username');
        acceptRequest(username);
    });
});

document.querySelectorAll('.btn-decline').forEach(button => {
    button.addEventListener('click', function(event) {
        let username = this.getAttribute('data-username');
        discardRequest(username);
    });
});

function acceptRequest(username) {



    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     console.log(this.responseText);
    //   }
    // };
    // xhttp.open("GET", "/script/acceptRequest.php?sender=" + username, true);
    // xhttp.send();
    // window.location.reload();

    $.ajax({
        url: '/script/acceptRequest.php',
        type: 'GET',
        data: {
            sender: username
        },
        success: function(response) {
            console.log(response);
            window.location.reload();
        }
    });
}

function discardRequest(username) {
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     console.log(this.responseText);
    //   }
    // };
    // xhttp.open("GET", "/script/discardRequest.php?sender=" + username, true);
    // xhttp.send();
    // window.location.reload();

    $.ajax({
        url: '/script/discardRequest.php',
        type: 'GET',
        data: {
            sender: username
        },
        success: function(response) {
            console.log(response);
            window.location.reload();
        }
    });
    
  }
