<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NewtoNetwork</title>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link rel="stylesheet" href="/css/index.css">
    </head>
    <body>
        <?php
            if (session_status() != PHP_SESSION_ACTIVE) {
               session_start();
            }
            if (!isset($_SESSION['username'])) {  
               header("Location: /homepage.php");
            }
            ?>
        <?php
            include "pages/navigationBar.php";
            include 'connection.php';
            // do a query for the user
            if (isset($_SESSION['username'])) {
               $username = $_SESSION['username'];
               $query = "SELECT * FROM users WHERE username = $1";
               $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
               $row = pg_fetch_array($result, null, PGSQL_ASSOC);
               $first_name = $row['first_name'];
               $surname = $row['surname'];
               $gender = $row['gender'];
               $birthday = $row['birthday'];
               $username = $row['username'];
               $user_email = $row['email'];
               $photoProfile = $row['photo'];
               $extensionProfile = $row['extensionphoto'];
               // $user_bio = $row['bio'];
               // $user_image = $row['image'];  TODO: add image to database
            }
            else {
               $first_name = "Mario";
               $surname = "Rossi";
               $gender = "male";
               $birthday = "04/10/2001";
               $username = "guest";
               $user_email = "guest@guest.com";
               // $user_bio = "";
               // $user_image = "";  TODO: add image to database
            }
            
            
            ?>
        <!----------- MAIN ------------->
        <main>
            <div class="container">
            <!--======== LEFT ========-->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <?php
                            echo " <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>" ;
                            ?>
                        <!-- <img src="/images/profile-1.jpg" alt="">   -->
                    </div>
                    <div class="handle">
                        <h4> <?php echo $first_name . " " . $surname ?> </h4>
                        <p> <?php echo "@" . $username ?> </p>
                    </div>
                </a>
                <!----------SIDEBAR----------- -->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span> <i class="uil uil-home-alt"></i> </span>
                        <h3>Home </h3>
                    </a>
                    <!-- <a class="menu-item">
                        <span> <i class="uil uil-compass"></i> </span>
                        <h3>Explore </h3>
                        </a> -->
                    <a class="menu-item" id="notifications">
                        <span> <i class="uil uil-bell"><small class="notifications-count">9+</small></i> </span>
                        <h3>Notifications </h3>
                        <!----------NOTIFICATION POPUP ------------>
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-photo">
                                    <img src="/images/profile-2.jpg" alt="">
                                </div>
                                <div class="notification-body">
                                    <b> Giulio Manuzzi</b> accepted your friend request
                                    <small class="text-muted"> 2 days ago </small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="/images/profile-3.jpg" alt="">
                                </div>
                                <div class="notification-body">
                                    <b> Sof Lor</b> commented on your post
                                    <small class="text-muted"> 1 hour ago </small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="menu-item" id="messages-notification">
                        <span> <i class="uil uil-envelope"><small class="notifications-count">6</small></i> </span>
                        <h3>Messages </h3>
                    </a>
                    <!-- <a class="menu-item">
                        <span> <i class="uil uil-bookmark"></i> </span>
                        <h3>Bookmarks </h3>
                        </a>
                        
                        <a class="menu-item">
                        <span> <i class="uil uil-palette"></i> </span>
                        <h3>Theme </h3>
                        </a>
                        <a class="menu-item">
                        <span> <i class="uil uil-setting"></i> </span>
                        <h3>Settings </h3>
                        </a> -->
                    <a class="menu-item">
                        <span> <i class="uil uil-chart-line"></i> </span>
                        <h3>Analytics </h3>
                    </a>
                </div>
                <!---------END OF SIDEBAR--------->
                <!-- Create trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPost">
                Create Post
                </button> 
                <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/script/backPost.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="photo" class="col-form-label">Image</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="content" name="content"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Add post</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <label for="create-post" class="btn btn-primary">Create Post</label> -->
            </div>
            <!-- -------------------- END OF LEFT ---------------- -->
            <!--======== MIDDLE ========-->
            <div class="middle">
                <!-- ----------------- QUOTE OF THE DAY --------------- -->
                <?php
                    $query = "SELECT * FROM quotes ORDER BY RANDOM() LIMIT 1";
                    $result = pg_query($dbconnession, $query) or die("Query failed: " . pg_last_error());
                    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
                    $phrase = $row['phrase'];
                    $writer = $row['writer'];
                    $photo = $row['photo'];     
                    $extension = $row['extensions'];          
                    echo "
                    
                    <div class='quote-square'> 
                    <div class='card mb-3' style='max-width: 540px;'>
                       <div class='row g-0'>
                          <div class='col-md-4'>
                             <img src='data:image/". $extension . ";base64," . $photo . "' alt='Binary Image' style='margin-top:1rem;border-radius:50%;object-fit: cover;width: 150px;height: 150px;' class='img-fluid rounded-start' alt='...'>
                          </div>
                          <div class='col-md-8'>
                             <div class='card-body'>
                                <h5 class='card-title' style='font-size:larger;margin-top:1rem'>QUOTE OF THE DAY</h5>
                                <p class='card-text' style='margin-top: 2rem;'  >“" . $phrase . "”</p>
                                <p class='card-text' style='margin-top: 1rem'><small class='text-body-secondary'><i> " . $writer . "</i></small></p>
                             </div>
                          </div>
                       </div>
                    </div>
                    </div>
                    ";
                    
                    ?>
                <!-- ----------------- END OF QUOTE OF THE DAY --------------- -->
                <!-- <form class="create-post" action="">
                    <div class="profile-photo">
                       <img src="/images/profile-1.jpg" alt="">
                    </div>
                    <input type="text" placeholder="What's on your mind, Diana?" id="create-post">
                    <input type="submit" value="Post" class="btn btn-primary">
                    
                    </form> -->
                <!-- ------------------ FEEDS -------------------- -->
                <div class="feeds">
                    <?php
                        include 'pages/printPost.php';
                        include 'script/convertTime.php';
                        
                        // do a query to get all the posts in postregssql
                        
                        // do a query to get all the posts in postregssql and sort them by date
                        $query = "SELECT * FROM posts ORDER BY created_at DESC";
                        $result = pg_query($dbconnession, $query);
                        while($line=pg_fetch_array($result, null, PGSQL_ASSOC)){;
                           $writer = $line['writer'];
                           $content = $line['post_content'];
                           $photo = $line['photo'];
                           $time = $line['created_at'];
                           $time = convertTime($time);
                           $query = "SELECT * FROM users WHERE username = '$writer'";
                           $result2 = pg_query($dbconnession, $query);
                           $line = pg_fetch_array($result2, null, PGSQL_ASSOC);
                           $photoProfileFeed = $line['photo'];
                           $extensionProfileFeed = $line['extensionphoto'];
                           echo printPost($writer, $content, $photo, $time, $photoProfileFeed, $extensionProfileFeed);
                        }
                        echo "</div>
                        </div>";
                        
                        ?>
                    <!--======== RIGHT ========-->
                    <div class="right">
                        <div class="messages">
                            <div class="heading">
                                <h4>Messages</h4>
                                <i class="uil uil-edit"></i>
                            </div>
                            <!-- -------------SEARCH BAR ----------------->
                            <div class="search-bar">
                                <i class="uil uil-search"></i>
                                <input type="search" placeholder="Search messages" id="message-search">
                            </div>
                            <!------------MESSAGE CATEGORY--------------->
                            <div class="category">
                                <h6 class="active">Primary</h6>
                                <h6>General</h6>
                                <h6 class="message-requests">Requests (7)</h6>
                            </div>
                            <!-- MESSAGE -->
                            <div class="message">
                                <div class="profile-photo">
                                    <img src="/images/profile-7.jpg">
                                    <div class="active"></div>
                                </div>
                                <div class="message-body">
                                    <h5>Edem Quist</h5>
                                    <p class="text-muted">Just woke up bruh</p>
                                </div>
                            </div>
                            <!-- MESSAGE -->
                            <div class="message">
                                <div class="profile-photo">
                                    <img src="/images/profile-14.jpg">
                                </div>
                                <div class="message-body">
                                    <h5>Ceccum</h5>
                                    <p class="text-muted">Sai...</p>
                                </div>
                            </div>
                        </div>
                        <!-- ----------- FRIEND REQUESTS --------------- -->
                        <div class="friend-requests">
                            <h4>Requests</h4>
                            
                            <?php
                                include 'pages/printRequest.php';

                                $query = "SELECT * FROM friend_requests WHERE reciver = $1";
                                $result = pg_query_params($dbconnession, $query, array($_SESSION['username']));
                                while($line=pg_fetch_array($result, null, PGSQL_ASSOC)){
                                    $sender = $line['sender'];
                                    $query = "SELECT * FROM users WHERE username = $1";
                                    $result2 = pg_query_params($dbconnession, $query, array($sender));
                                    $line = pg_fetch_array($result2, null, PGSQL_ASSOC);
                                    $photo = $line['photo'];
                                    $extension = $line['extensionphoto'];
                                    $name = $line['first_name'];
                                    $surname = $line['surname'];
                                    $username = $line['username'];
                                    echo printRequest($name, $surname, $photo, $extension, $username);
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script src="/js/index.js"></script>
    <script src="/js/requestHandler.js"></script>
</html>