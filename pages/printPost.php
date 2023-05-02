<?php

    include "../connection.php";

    function printPost($post_id, $writer, $content, $photo, $time, $photoProfile, $extensionProfile){

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }
        
        $query12 = "SELECT * FROM likes WHERE user_id = $1 AND post_id = $2";
        
        // echo "CIAO";
        $result12 = pg_query_params($dbconnession, $query12, array($username, $post_id)) or die("Query failed: " . pg_last_error());
        
        // $class = "";
        // echo "Ciao";
        // if ($line12=pg_fetch_array($result3,null, PGSQL_ASSOC)){
        //     $class = "active";
        // }
        
                        $send= "
                        <div class='feed'>
                        <div class='head'>
                            <div class='user'>
                            <div class='profile-photo'>
                                <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>

                            </div>
                            <div class='info'>
                                <h4>" . $writer . "</h4>
                                <small>Terni, "  . $time . " ago</small>
                            </div>
                            </div>
                            <span class='edit'>
                            <i class='uil uil-ellipsis-h'></i>
                            </span>
                        </div>
    
                        <div class='photo'>
                            <img src='data:image/jpg;base64," . $photo . "' alt='Binary Image'>

                        </div>
    
                        <div class='action-buttons'>
                            <div class='interaction-buttons'>
                            <a href='#' style='text-decoration:none;color:black;' class='material-symbols-outlined " . $class . "' username=" . $username . " post_id=" . $post_id . " name='heart'>favorite</a>
                            <a href='#' style='text-decoration:none;color:black;' class='material-symbols-outlined' name='comment'>comment</a>
    
                            </div>
    
                            <div class='bookmark'>
                            <span><i class='uil uil-bookmark'></i></span>
                            </div>
                        </div>
                        <div class='liked-by'>
                            <span> <img src='/images/profile-10.jpg'></span>
                            <span> <img src='/images/profile-4.jpg'></span>
                            <span> <img src='/images/profile-15.jpg'></span>
                            <p> Liked by <b>Stocazzo</b> and <b>123 others</b></p>
                        </div>
    
                        <div class='caption'>
                            <p> <b>" . $writer . "</b>" . " "  . $content . "</p>
                            <span class='harsh-tag'>#lifestyle</span>
                        </div>
    
                        <div class='comments text-muted'>View all 277 comments</div>
                    </div>
                        ";
                        return $send;
                    }
?>