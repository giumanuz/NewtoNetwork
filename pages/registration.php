<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="/css/login.css">
      <title>
         Registration
      </title>
   </head>
   <body>
      <?php
         session_start();
         if (isset($_SESSION['username'])):
             header("Location: /index.php");
         endif;
         
         include "navigationBar.php";     
      ?>

      <div class="alert alert-danger fade" role="alert" id="errorAlert">
         <strong>Error!</strong> <span id="errorAlertText"> </span>
      </div>

      <div class="container">
         <div class="title">Registration</div>
         <div class="content">
            <form name="registrationForm" enctype="multipart/form-data" id="registrationFormId">
               <div class="user-details">
                  <div class="input-box">
                     <label><span class="details">Name</span>
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
                  <div class="input-box" >
                     <label>
                     <span class="details">Select photo to upload</span>
                     <input type="file" class='form-control' name="photo" id="photo" style='height:100%;width:100%;'>
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
               <div class="button" id="modalButton">
                  <input type="submit" value="Register">
               </div>
            </form>
         </div>
      </div>

   </body>
</html>

<script src="/js/registration.js"></script>
