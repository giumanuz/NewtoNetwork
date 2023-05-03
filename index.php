<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewtoNetwork</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>


<body>
    <?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (!isset($_SESSION['username'])) {
        header("Location: /homepage.php");
    }

    include "pages/navigationBar.php";
    include 'connection.php';
    include 'script/convertTime.php';
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
    } else {
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
                        echo " <img src='data:image/" . $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>";
                        ?>
                        <!-- <img src="/images/profile-1.jpg" alt="">   -->
                    </div>
                    <div class="handle">
                        <h4 style="color: var(--color-primary);">
                            <?php echo $first_name . " " . $surname ?>
                        </h4>
                        <p class="text-muted">
                            <?php echo "@" . $username ?>
                        </p>
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

                            <?php
                            include 'pages/printNotification.php';
                            
                            $query = "SELECT * FROM notifications WHERE user_to = $1 ORDER BY created_at DESC";
                            $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
                            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                $user_from = $line['user_from'];
                                $notification_content = $line['notification_content'];
                                $date = $line['created_at'];
                                $date = convertTime($date);
                                $query = "SELECT * FROM users WHERE username = $1";
                                $result2 = pg_query_params($dbconnession, $query, array($user_from)) or die("Query failed: " . pg_last_error());
                                $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
                                $first_name = $line2['first_name'];
                                $surname = $line2['surname'];
                                $photoProfile = $line2['photo'];
                                $extensionProfile = $line2['extensionphoto'];
                                echo printNotification($first_name, $surname, $photoProfile, $extensionProfile, $notification_content, $date);
                            } 
                        ?>

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
                <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="material-symbols-outlined" style="margin-right:1rem;">
                                    edit_square
                                </span>
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New Post</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/script/backPost.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="photo" class="col-form-label">Image</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="col-form-label">Description:</label>
                                        <textarea class="form-control" id="content" name="content"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Choose the category:</label>
                                        <select aria-label="Default select example" name="category">
                                            <option value="math">Math</option>
                                            <option value="informatics">Informatics</option>
                                            <option value="phisics">Phisics</option>
                                            <option value="science">Science</option>
                                            <option value="chemistry">Chemistry</option>
                                            <option value="biology">Biology</option>
                                            <option value="english">English</option>
                                            <option value="italian">Italian</option>
                                            <option value="history">History</option>
                                            <option value="geography">Geography</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button submit" class="btn btn-primary"
                                            style="border:none;background-color: var(--color-primary);">Add
                                            post</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary"
                    style="border-radius:var(--border-radius);border:none;background-color: var(--color-primary);"
                    data-bs-toggle="modal" data-bs-target="#modalPost">
                    Create Post
                </button>
                <script>
                $("#modalPost").prependTo("body");
                </script>

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
                    
                    <div class='quote-square' style='z-index:-1;'> 
                    <div class='card mb-3' style='max-width: 540px;border:none;z-index:0;'>
                       <div class='row g-0' style='z-index:1;'>
                          <div class='col-3'>
                             <img class=\"profile-photo\" src='data:image/" . $extension . ";base64," . $photo . "' alt='Binary Image' style='margin-top:1rem;border-radius:50%;object-fit: cover;width: 150px;height: 150px;' class='img-fluid rounded-start' alt='...'>
                          </div>
                          <div class='col-1'></div>
                          <div class='col-8'>
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

                    if (isset($_GET['category']) && $_GET['category'] != "") {
                        $category = $_GET['category'];
                        $query = "SELECT * FROM posts WHERE category = '$category' ORDER BY created_at DESC";
                    } else {
                        $query = "SELECT * FROM posts ORDER BY created_at DESC";
                    }
                    $result = pg_query($dbconnession, $query);
                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                        $writer = $line['writer'];
                        $post_id = $line['post_id'];
                        $content = $line['post_content'];
                        $photo = $line['photo'];
                        $time = $line['created_at'];
                        $category = $line['category'];
                        $time = convertTime($time);
                        $query = "SELECT * FROM users WHERE username = '$writer'";
                        $result2 = pg_query($dbconnession, $query);
                        $line = pg_fetch_array($result2, null, PGSQL_ASSOC);
                        $photoProfileFeed = $line['photo'];
                        $extensionProfileFeed = $line['extensionphoto'];
                        $class = "";
                        $query3 = "SELECT * FROM likes WHERE post_id = '$post_id' AND user_id = '$username'";
                        $result3 = pg_query($dbconnession, $query3);
                        if (pg_num_rows($result3) == 1) {
                            $class = "active";
                        }
                        echo printPost($post_id, $writer, $content, $photo, $time, $photoProfileFeed, $extensionProfileFeed, $class, $username, $category);
                    }
                    echo "</div>
                        </div>";

                    ?>
                    <!--======== RIGHT ========-->
                    <div class="right">
                        <div class="messages">
                            <div class="heading">
                                <h4>Messages</h4>
                                <!-- <i class="uil uil-edit"></i> -->
                            </div>
                            <!-- -------------SEARCH BAR ----------------->
                            <div class="search-bar">
                                <i class="uil uil-search"></i>
                                <input type="search" style="width: 10rem;" placeholder="Search messages"
                                    id="message-search">
                            </div>
                            <!------------MESSAGE CATEGORY--------------->
                            <!-- <div class="category">
                                <h6 class="active">Primary</h6>
                                <h6>General</h6>
                                <h6 class="message-requests">Requests (7)</h6>
                            </div> -->
                            <!-- MESSAGE -->
                            <div style="overflow-y:scroll;max-height:50vh;">
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
                        </div>
                        <!-- ----------- FRIEND REQUESTS --------------- -->
                        <h4>Requests</h4>
                        <div class="friend-requests" style="overflow:scroll;height:50vh;">

                            <?php
                            include 'pages/printRequest.php';

                            $query = "SELECT * FROM friend_requests WHERE reciver = $1";
                            $result = pg_query_params($dbconnession, $query, array($_SESSION['username']));
                            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
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
<script src="./js/index.js"></script>
<script src="./js/requestHandler.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</html>