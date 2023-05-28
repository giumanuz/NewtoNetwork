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
      <div class="center">
        <h1>
            Registration
        </h1>
         <form name="registrationForm" id="registrationFormId" enctype="multipart/form-data" method="post">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="txt_field">
                        <input type="text" name="name" required>
                        <label for="">Name</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="surname" required>
                        <label for="">Surname</label>
                    </div>
                    <div class="txt_field">
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="txt_field">
                        <input type="password" name="password1" required>
                        <label for="">Password</label>
                    </div>
                
                    <div class="txt_field">
                        <input type="password" name="password2" required>
                        <label for="">Confirm password</label>
                    </div>
                    <div class="txt_field" style="top:-24px;">
                        <span for="" style="color: #adadad;">Birthday</span>
                        <input type="date" name="bday" required>
                    </div>
                    <div class="txt_field" style="top:-48px;">
                        <span for="" style="color: #adadad;">Select photo to upload</span>
                        <input type="file" name="photo" id="photo" >
                    </div>
                </div>
            </div>
            <input type="submit" style="margin-bottom:3rem;" value="Register">            
         </form>
    </div>
    
</body>
</html>
<script src="/js/registration.js"></script>
    

    