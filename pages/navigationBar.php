<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
  
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a href="/index.php" class="navbar-brand">NewtoNetwork</a>
                </div>
  
                <div class="navbar-collapse collapse" id="mobile_menu">
  
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="">About As</a></li>
                    </ul>
  
                    <ul class="nav navbar-nav navbar-center">
                        <li>
                            <form action="" class="navbar-form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="search" name="search" id="searchBar" placeholder="Search..." class="form-control">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        session_start();
                            if (isset($_SESSION['username'])){
                                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profilo</a></li>';
                                echo '<li><a onClick= "deleteAllCookies()"> <span class="glyphicon glyphicon-log-out"></span> Logout </a></li>';
                            }else{
                                echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Register <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="/pages/login.php">Login</a></li>
                                        <li><a href="/pages/registration.php">Sign Up</a></li>
                                        </ul>
                                    </li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>

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