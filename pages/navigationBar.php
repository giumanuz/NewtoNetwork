<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
  
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a href="\\localhost:3000\index.php" class="navbar-brand">NewtoNetwork</a>
                </div>
  
                <div class="navbar-collapse collapse" id="mobile_menu">
  
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="\\localhost:3000\index.php">About As</a></li>
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
                            if (isset($_SESSION['name'])){
                                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profilo</a></li>';
                                echo '<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                            }else{
                                echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Registrati <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="localhost:3000/pages/login.php">Login</a></li>
                                        <li><a href="localhost:3000/pages/registration.php">Sign Up</a></li>
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