<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php
   if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
   }
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" style="background-color:var(--color-primary);">
  <div class="container-fluid">
    <a class="navbar-brand" href="/homepage.php">NewtoNetwork</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

         <li class="nav-item">
            <a class="nav-link" href="/curious.php">I feel curious</a>
         </li>
      </ul>
      <?php 

         if (isset($_SESSION['username']) && $_SERVER["PHP_SELF"] !== '/curious.php'): ?>
            <ul class="nav navbar-nav navbar-center">
               <li>
                  <form class="d-flex" method="get" action="/index.php">
                     <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="category">
                     <button class="btn btn-outline-light" type="submit">Search</button>
                  </form>
               </li>
            </ul>
         <?php endif; ?>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
         <?php 
         if (isset($_SESSION['username'])): 
            
            if($_SERVER["PHP_SELF"] !== '/curious.php'){?>
               <li class="nav-item">
                  <button class="nav-link" style="background:none;border:none;" id='makeFriendsButton' >Add Friend</button>
               </li> <?php }
               ?>
            
            <li class="nav-item">
               <a class="nav-link" href="/script/logout.php">Logout</a>
            </li>
         <?php else: ?>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login/Sign Up
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/pages/login.php">Login</a></li>
                  <li><a class="dropdown-item" href="/pages/registration.php">Sign Up</a></li>
               </ul> 
            </li>
         <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>