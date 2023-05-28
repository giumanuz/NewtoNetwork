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

    include_once "pages/navigationBar.php";
    include_once 'connection.php';
    include_once 'script/convertTime.php';
    
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
      
    } else {
        $first_name = "Mario";
        $surname = "Rossi";
        $gender = "male";
        $birthday = "04/10/2001";
        $username = "guest";
        $user_email = "guest@guest.com";
        
    }



    function returnPhotoLike($dbconnession, $post_id)
    {
        $arrayLike = array();
        $query5 = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 3";
        $result5 = pg_query_params($dbconnession, $query5, array($post_id));
        // create a array to store the photo and the extension of the users who liked the post
        while ($line5 = pg_fetch_array($result5, null, PGSQL_ASSOC)) {
            $userOfLiker = $line5['user_id'];
            $query6 = "SELECT * FROM users WHERE username = $1";
            $result6 = pg_query_params($dbconnession, $query6, array($userOfLiker));
            $line6 = pg_fetch_array($result6, null, PGSQL_ASSOC);
            $photoOfLiker = $line6['photo'];
            $extensionOfLiker = $line6['extensionphoto'];
            $arrayLike[] = array($photoOfLiker, $extensionOfLiker);
        }
        return $arrayLike;
    }


    function returnPersonLike($dbconnession, $post_id)
    {
        $query6 = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 1";
        $result6 = pg_query_params($dbconnession, $query6, array($post_id));
        $line6 = pg_fetch_array($result6, null, PGSQL_ASSOC);
        if ($line6 == false) {
            return null;
        }
        $userOfLiker = $line6['user_id'];
        return $userOfLiker;
    }


    ?>


<!----------- MAIN ------------->
<main >
    <div class="container" >
            <!--======== LEFT ========-->
            <div class="left">
                <a class="profile" style="">
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
                <div class="sidebar" style="">
                    <a class="menu-item active">
                        <span> <i class="uil uil-home-alt"></i> </span>
                        <h3>Home </h3>
                    </a>
                
                    <a class="menu-item" id="notifications">
                        <?php
                            $query = "SELECT * FROM notifications WHERE user_to = $1 ORDER BY created_at DESC";
                            $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
                            $num_rows = pg_num_rows($result);
                            if ($num_rows > 0) {
                                echo "<span> <i class='uil uil-bell'><small class='notifications-count'>$num_rows</small></i> </span>";
                            } else {
                                echo "<span> <i class='uil uil-bell'></i> </span>";
                            }
                            ?>
                        <h3>Notifications </h3>
                    </a>

                        

                        <!----------NOTIFICATION POPUP ------------>
                        <div class="notification-popup" id="notificationPopup" style='display:none'>
                            <div class="popup-content">
                                <div class='headerComments' style='overflow:hidden;'>
                                    <h4>Notifications</h4>
                                    <button class='material-symbols-outlined topright' id='notificationClosePopup'> close </button>
                                </div>
                            <hr>
                            <div class='popup-body'>
                            <?php
                            include_once 'pages/printNotification.php';
                            
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
                            </div>

                        </div>
                       
                    
                    <a class="menu-item" id="messages-notification">
                        <span> <i class="uil uil-envelope"></i> </span>
                        <h3>Write a message </h3>
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
                    <div class='card mb-3 d-flex flex-sm-row text-center justify-content-center' style='max-width: 100%;border:none;z-index:0;'>
                       
                          <div class='px-auto d-flex text-center justify-content-center' style='justify-self:center;'>
                             <img class=\"profile-photo my-auto \" src='data:image/" . $extension . ";base64," . $photo . "' alt='Binary Image' style='text-align:center;margin-top:1rem;border-radius:50%;object-fit: cover;width: 150px;height: 150px;' class='img-fluid rounded-start' alt='...'>
                          </div>
                          
                         
                             <div class='card-body mx-auto '>
                                <h5 class='card-title ' style='font-size:larger;margin-top:1rem'>QUOTE OF THE DAY</h5>
                                <p class='card-text' style='margin-top: 2rem;'  >“" . $phrase . "”</p>
                                <p class='card-text' style='margin-top: 1rem'><small class='text-body-secondary'><i> " . $writer . "</i></small></p>
                             </div>
                          
                       
                    </div>
                    </div>
                    ";

                ?>
                <!-- ----------------- END OF QUOTE OF THE DAY --------------- -->

                <!-- ------------------ FEEDS -------------------- -->
                
                    <div class="feeds">
                    <div id='friendsPopup' class='friends-popup'>
                        <div class='popup-content' style='max-height:25rem;'>
                            <div class='headerComments'>
                                <h4>Make new friends </h4>
                                <button class='material-symbols-outlined topright' id='closefriendsPopup'> close </button>
                            </div>
                            <div class="search-bar">
                                <i class="uil uil-search"></i>
                                <input type="search" style="width: 10rem;margin-top:1rem;margin-bottom:1rem;" placeholder="Search profiles"
                                    id="profile-search">
                                
                            </div>
                            <hr>
                            <?php 
                            $toShow='';
    
                            $query2 = "SELECT * FROM users";
                                $result2 = pg_query($dbconnession, $query2) or die("Query failed: " . pg_last_error());
                                while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
                                    $username2 = $line2['username'];
                                    if($username2 === $username){ continue;}
                                    $photoProfile = $line2['photo'];
                                    $first_name2 = $line2['first_name'];
                                    $extensionProfile = $line2['extensionphoto'];
                                    $surname2 = $line2['surname'];
                                    $query3 = "SELECT * FROM friend_requests WHERE (sender = $1 AND reciver = $2) OR (sender = $2 AND reciver = $1)";
                                    $result3 = pg_query_params($dbconnession,$query3,array($username,$username2)) or die("Query failed: " . pg_last_error());
                                    $class = '';
                                    if($line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
                                            $class = 'invisible';
                                    }

                                    $query3 = "SELECT * FROM friends WHERE (user_id = $1 AND friend_user_id = $2) OR (user_id = $2 AND friend_user_id = $1)";
                                    $result3 = pg_query_params($dbconnession,$query3,array($username,$username2)) or die("Query failed: " . pg_last_error());
                                    if($line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
                                            continue;
                                    }
                                    

                                    $toShow = $toShow . " 
                                    <div class='profile profile-to-search'>
                                        <div class='profile-photo'>
                                            <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                        </div>
                                        <div class='handle'>
                                            <h4 style='color: var(--color-primary);font-size:1.4rem;'>
                                                " . $first_name2 . " " . $surname2 . "
                                            </h4>
                                            <p class='text-muted'>
                                                @" . $username2 . "
                                            </p>
                                        </div>
                                        <div class='buttons' style='margin-left:auto;'>
                                            <button name='addButton' usern='". $username . "' friend='". $username2 . "' class='material-symbols-outlined ". $class ."' style='left:4rem;background:none;border:none;text-align:right;'>
                                            add_circle
                                            </button>
                                        </div>
                                        
                                    </div>
                
                               
                        ";
                        
                                }
                        
                            
                            echo $toShow;
                            ?>
                        </div>
                    </div>
                    
                    <?php
                    include_once 'pages/printPost.php';

                    if (isset($_GET['category']) && $_GET['category'] != "") {
                        $category = $_GET['category'];
                        $query = "SELECT * FROM posts WHERE category = '$category' or writer = '$category' ORDER BY created_at DESC";
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
                        $query4 = "SELECT * FROM likes WHERE post_id = $1";
                        $result4 = pg_query_params($dbconnession, $query4, array($post_id));
                        $likes = pg_num_rows($result4) -1;



                        $arrayLike = returnPhotoLike($dbconnession, $post_id);
                        $userOfLiker = returnPersonLike($dbconnession, $post_id);


                        echo printPost($post_id, $writer, $content, $photo, $time, $photoProfileFeed, $extensionProfileFeed, $class, $username, $category, $likes, $arrayLike , $userOfLiker);
                    }
                    echo "</div>
                        </div>";

                    ?>
                    <div id='messagePopup' class='comment-popup' style='overflow:hidden;'>
                        <div class='popup-content' style='overflow:hidden;'>
                        <div class='headerComments' style='overflow:hidden;'>
                            <h4>Write a message</h4>
                            <button class='material-symbols-outlined topright' id='messageClosePopup'> close </button>
                        </div>
                        <hr>
                        <div class="alert alert-danger fade" role="alert" id="errorAlert" style='display:none;'>
                                <strong>Error!</strong> <span id="errorAlertText"> </span>
                        </div>
                        <form name='messageForm'  id="messageFormId">
                            <input name='friend' type='text' id='messageReceiver' class='comment-input' style='max-width:100%;' placeholder='Receiver' >
                            
                            <input name='message' type='text' id='messageContent' class='message-input' placeholder='Content' style='margin-top:1.5rem;max-width:100%;'></input>
                            <br>
                            <button name='messageSend' type="button submit" class="btn btn-primary"
                                style="margin-top:1rem;border-radius:var(--border-radius);border:none;background-color: var(--color-primary);">
                                Send
                            </button>
                            
                        </form>
                    
                    

                    </div>
                    </div>
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
                        
                            <!-- MESSAGE -->
                            <div style="overflow-y:scroll;max-height:30vh;">
                        
                                <?php

                                    include_once 'pages/printMessage.php';

                                    $query = "SELECT * FROM messages WHERE receiver = $1 ORDER BY created_at DESC";
                                    $result = pg_query_params($dbconnession,$query,array($username)) or die("Query failed: " . pg_last_error());
                                    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                        $sender = $line['sender'];
                                        $message = $line['message_content'];
                                        $query2 = "SELECT * FROM users WHERE username = $1";
                                        $result2 = pg_query_params($dbconnession,$query2,array($sender)) or die("Query failed: " . pg_last_error());
                                        $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
                                        $photo = $line2['photo'];
                                        $extension = $line2['extensionphoto'];

                                        echo printMessage($sender, $message, $photo, $extension);
                                    }
                                ?>

                            </div>
                        </div>
                        <!-- ----------- FRIEND REQUESTS --------------- -->
                        <h4 style="margin-top:1rem;">Requests</h4>
                        <div class="friend-requests" style="overflow-y:scroll;max-height:30vh;border-radius:var(--border-radius);box-shadow: 0 0 1rem var(--color-primary);">

                            <?php
                            include_once 'pages/printRequest.php';

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
                                $usernameRequest = $line['username'];
                                $usernameUser = $_SESSION['username'];
                                // query to find the numbers of mutual friends
                                $query3 = "SELECT f1.friend_user_id
                                            FROM friends AS f1
                                            JOIN friends AS f2 ON f1.friend_user_id = f2.friend_user_id
                                            WHERE f1.user_id = $1
                                            AND f2.user_id = $2
                                            AND f1.friend_user_id <> $1
                                            GROUP BY f1.friend_user_id ";
                                $result3 = pg_query_params($dbconnession, $query3, array($usernameRequest, $usernameUser));
                                $line3 = pg_fetch_array($result3, null, PGSQL_ASSOC);
                                $mutualFriends = pg_num_rows($result3);
                                echo printRequest($name, $surname, $photo, $extension, $usernameRequest, $mutualFriends);
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