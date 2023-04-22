<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/login.css">


  <title>
    Registration
  </title>
</head>
<body>

    <?php
      include "navigationBar.php";

      if (isset($_GET['status']) && $_GET['status'] == 'errorEmailUsed'):
        echo '<div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Email already used, try again or click <a href = "/pages/login.php">here</a> to login.
              </div>';
      endif;

      if (isset($_GET['status']) && $_GET['status'] == 'errorUsernameUsed'):
        echo '<div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Username already used, try again or click <a href = "/pages/login.php">here</a> to login.
              </div>';
      endif;

      if (isset($_GET['status']) && $_GET['status'] == 'errorRegistration'):
        echo '<div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Registration failed, try again or click <a href = "/pages/login.php">here</a> to login.
              </div>';
      endif;
    ?>
  


<div class="container">
  <div class="content">
    <form action="/script/backRegistration.php" method="post" name="registrationForm" onsubmit="return validateForm();"> <!-- TODO: aggiungi azione qui-->
      <div class="user-details">
        <div class="input-box">
          <label>
          <span class="details">Name</span>
            <input type="text" placeholder="Insert the name" name="name" style="text-emphasis-color: #9b59b6" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Surname</span>
            <input type="text" placeholder="Insert the surname" name="surname" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Email</span>
            <input type="email" placeholder="Insert the email" name="email" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Username</span>
            <input type="text" placeholder="Insert the username" name="username" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Password</span>
            <input type="password" placeholder="Insert the password" name="password1" required>
          </label>
        </div>
        <div class="input-box">
          <label>
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm the password" name="password2" required>
          </label>
        </div>
        <div class="input-box">
            <label>
                <span class="details">Birthday</span>
                <input type="date" name="bday"  required>
            </label>
        </div>
      </div>

      <div class="gender-details">
        <span class="gender-title">Gender</span>
        <input type="radio" id="male" name="gender" value="male" checked>
        <input type="radio" id="female" name="gender" value="female">
        <input type="radio" id="other" name="gender" value="other">
        <div class="category">
          <label for="male">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label> 
        
          <label for="female">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label> 
        
          <label for="other">
            <span class="dot three"></span>
            <span class="gender">Other</span>
          </label> 
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Register">
      </div>
    </form>
  </div>
</div>
