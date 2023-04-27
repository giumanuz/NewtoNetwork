<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
   if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
   }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">NewtoNetwork</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="/index.php">About as</a>
         </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-center">
         <li>
            <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
         </li>
      </ul>


      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
         <?php 
         if (isset($_SESSION['username'])): ?>
            <!-- <li class="nav-item">
               <a class="nav-link" href="/pages/addQuote.php">Profile</a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="/pages/createPost.php">Profile</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/homepage.php" onClick= "deleteAllCookies()">Logout</a>
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

<script>
   function deleteAllCookies() {
      const cookies = document.cookie.split(";");

      for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i];
            const eqPos = cookie.indexOf("=");
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
      location.reload();  
      window.location.href = "/index.php";
   }
</script>