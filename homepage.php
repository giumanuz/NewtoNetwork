<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Homepage</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body style="overflow:scroll;background-repeat: no-repeat; background-size: cover;background-image: linear-gradient(135deg, #71b7e6, #9b59b6); background-attachment: scroll;min-height:100vh;">

  <img src="./images/gravity-svgrepo-com.svg" style="margin-top: 4rem;"
    class="rounded mx-auto d-block animate__animated animate__fadeInDown animate__slower animate__infinite" alt=""
    height="100" width="100">
  <h1 class="text-center p-5 display-2">
    <!-- put a nice font on the following element -->
    <font-awesome-icon icon="fa-solid fa-terminal" beat-fade />
    <strong style="color: rgb(21, 20, 20);font-weight: bold;"> NewtoNetwork</strong>
    <h2 style="font-weight: bold;"> The first STEM social network</h2>
  </h1>

  <div class="text-center">

    <?php
    if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
    }
    if (!isset($_SESSION['username'])) {
      echo "<a role='button' href='./pages/registration.php' class='btn btn-dark' style='font-weight: 500;margin-right: 1rem;'>Sign up</a>
              <a role='button' href='./pages/login.php' class='btn btn-dark'>Log In</a>";
    } else
      echo "<a role='button' href='./index.php' class='btn btn-dark' style='font-weight: 500;margin-right: 1rem;'>Go to your profile</a>";
    ?>


  </div>

  <div class="container-fluid text-center" style="margin-top: 4rem;">
    <div class="row justify-content-between">
      
      <div class="col-lg-4 d-flex justify-content-center">
        <div
          class="card border-dark mb-3 animate__animated animate__pulse animate__infinite animate__slower animate__delay-1s"
          style="color:black; max-width: 18rem;background-color: rgba(155,89,182,.25);">
          <div class="card-header">
            <span class="material-symbols-outlined">
              tips_and_updates
            </span>
          </div>
          <div class="card-body">
            <h5 class="card-title">About us</h5>
            <p class="card-text">Matteo D'Agostino (@digos)
              & Giulio Manuzzi (@giuliu) are the authors of this beautiful website.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 d-flex justify-content-center">
        <div
          class="card border-dark mb-3 animate__animated animate__pulse animate__infinite animate__slower animate__delay-2s"
          style="color: black;max-width: 18rem;background-color: rgba(155,89,182,.25);">
          <div class="card-header">
            <span class="material-symbols-outlined">
              approval_delegation
            </span>
          </div>
          <div class="card-body">
            <h5 class="card-title">What do we offer?</h5>
            <p class="card-text">A new kind of Social Network focused on rational and scientific thinking. Share the knowledge!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 d-flex justify-content-center">
        <div
          class="card border-dark mb-3 animate__animated animate__pulse animate__infinite animate__slower animate__delay-3s"
          style="color:black; max-width: 18rem;background-color: rgba(155,89,182,.25);">
          <div class="card-header">
            <span class="material-symbols-outlined">
              biotech
            </span>
          </div>
          <div class="card-body">
            <h5 class="card-title">In Science we trust</h5>
            <p class="card-text">
Science unveils the wonders of nature and fuels the quest for knowledge.</p>
          </div>
        </div>
      </div>
      
    </div>

  </div>

</html>