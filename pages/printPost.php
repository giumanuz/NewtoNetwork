<?php

    function printPost($post_id, $writer, $content, $photo, $time, $photoProfile, $extensionProfile, $class, $username, $category){
        
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
            <a style='text-decoration:none;color:black;' class='material-symbols-outlined " . $class . "' username=" . $username . " post_id=" . $post_id . " name='heart'>favorite</a>
            <a style='text-decoration:none;color:black;' class='material-symbols-outlined' name='comment'>comment</a>

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
            <span class='harsh-tag'>#"  . $category . "</span>
        </div>

        <div class='comments text-muted'>View all 277 comments</div>
    </div>
        ";
        return $send;
    }
?>