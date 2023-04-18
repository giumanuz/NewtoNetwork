<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/login.css">


  <title>
    Registration
  </title>
</head>
<body>

    <?php
      include "navigationBar.php"
    ?>
  
<div class="container">
  <div class="content">
    <form action="../script/backRegistration.php" method="post" name="registrationForm" onsubmit="return validateForm();"> <!-- TODO: aggiungi azione qui-->
      <div class="user-details">
        <div class="input-box">
          <label>
          <span class="details">Nome</span>
            <input type="text" placeholder="Inserisci il nome" name="name" style="text-emphasis-color: #9b59b6" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Cognome</span>
            <input type="text" placeholder="Inserisci il cognome" name="surname" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Email</span>
            <input type="email" placeholder="Inserisci la tua email" name="email" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Password</span>
            <input type="password" placeholder="Inserisci la password" name="password1" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Conferma Password</span>
            <input type="password" placeholder="Conferma la password" name="password2" required>
          </label>
        </div>
        <div class="input-box">
            <label>
                <span class="details">Data di nascita</span>
                <input type="date" name="bday"  required>
            </label>
        </div>
      </div>



      <div class="gender-details">
        <input type="radio" name="gender" id="male">
        <input type="radio" name="gender" id="female">
        <input type="radio" name="gender" id="other">
        <span class="gender-title">Genere</span>
        <div class="category">
          <label for="male">
            <span class="dot one"></span>
            <span class="gender">Maschio</span>
          </label>
          <label for="female">
            <span class="dot two"></span>
            <span class="gender">Femmina</span>
          </label>
          <label for="other">
            <span class="dot three"></span>
            <span class="gender">Altro</span>
          </label>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Registrazione">
      </div>
    </form>
  </div>
</div>

</body>
</html>