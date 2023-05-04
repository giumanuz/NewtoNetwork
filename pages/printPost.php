<?php
    include_once "connection.php";
    include_once "script/convertTime.php";

    function costructComment($text, $photoProfile, $extensionProfile, $username, $time){
        $comment = "<div class='comment'>
                    <div class='profile-photo'>
                        <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                    </div>
                    <div class='notification-body'>
                        <b style='margin-right:0.5rem;'> ". $username . " </b>  ". $text . "
                        <small class='text-muted'> ". $time . "</small>
                    </div>
                </div>

                <hr>
        ";
        return $comment;
    }

    function printPost($post_id, $writer, $content, $photo, $time, $photoProfile, $extensionProfile, $class, $username, $category){
        global $dbconnession;

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
        <div id='commentPopup" . $post_id . "' class='popup'>
            <div class='popup-content'>
            <div class='headerComments'>
                <h4>Comments</h4>
                <button class='material-symbols-outlined topright' id='closePopup". $post_id . "'> close </button>
            </div>
            <div id='comments' class='comments'> ";

        $query = "SELECT * FROM comments WHERE post_id = $1 ORDER BY comment_id DESC";
        $result = pg_query_params($dbconnession, $query, array($post_id)) or die("Query failed: " . pg_last_error());
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $text = $line['comment_content'];
            $user_id = $line['user_id'];
            $query2 = "SELECT * FROM users WHERE username = $1";
            $result2 = pg_query_params($dbconnession, $query2, array($user_id)) or die("Query failed: " . pg_last_error());
            $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
            $photoProfile = $line2['photo'];
            $extensionProfile = $line2['extensionphoto'];
            $time = $line['created_at'];
            $time = convertTime($time);
            $send = $send . costructComment($text, $photoProfile, $extensionProfile, $username, $time);

        }
        
        $send = $send . "
             </div>
            </div>
        </div>
  
        <div class='action-buttons'>
            <div class='interaction-buttons'>
            <a style='text-decoration:none;color:black; cursor:pointer;' class='material-symbols-outlined " . $class . "' username=" . $username . " post_id=" . $post_id . " name='heart'>favorite</a>
            <a id='myButton". $post_id . "' style='text-decoration:none;color:black; cursor:pointer;' class='material-symbols-outlined '  name='comment'>comment</a>

            </div>
        
    <script>
    myButton". $post_id . ".addEventListener('click', function () {
        commentPopup" . $post_id .".classList.add('show');
        document.body.style.overflow = 'hidden !important';
    });
    closePopup". $post_id .".addEventListener('click', function () {
        commentPopup" . $post_id .".classList.remove('show');
        document.body.style.overflow = 'auto';
    });
    window.addEventListener('click', function (event) {
        if (event.target == commentPopup". $post_id . ") {
            commentPopup". $post_id .".classList.remove('show');
            document.body.style.overflow = 'auto';
        }
    });
</script>

            
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
        <div <name='input-for-comment' style='margin-top:0.85rem;z-index:1 !important;display:flex;' >
            

            <form id='comment-form'>
                <input name='commentInput' type='text' id='idCommentInput$post_id' class='comment-input' placeholder='Leave a comment' aria-label='Leave a comment' aria-describedby='button-addon2'>
                <button type='submit' name='sendComment' style='margin-left:1rem;background-color:white;display:none;' class='material-symbols-outlined disabled btn-addComment' for='input-for-comment' data-username='". $username ."' data-id_post='". $post_id ."'>
                    send
                </button>
            </form>

        </div>
        
    </div>
    

        ";
        return $send;
    }
?>