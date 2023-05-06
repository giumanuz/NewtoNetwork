<?php
    include_once "connection.php";
    include_once "script/convertTime.php";

    function printPhoto($photo, $extension){
        return "<span> 
                    <img src='data:image/". $extension . ";base64," . $photo . "' alt='Binary Image'>
                </span>";
    }

    function printPhotosLike($array){
        $send = "";
        foreach($array as $photo){
            $send = $send . printPhoto($photo[0], $photo[1]);
        }
        return $send;
    }

    function printPost($post_id, $writer, $content, $photo, $time, $photoProfile, $extensionProfile, $class, $username, $category, $numberLikes, $arrayLike, $userOfLiker){
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
            <div id='comments$post_id' class='comments'> ";

        
        
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

    function showComments(post_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.open('GET', '/script/showComments.php?post_id=' + post_id , false);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send();

        return xhttp.responseText;
    }

    myButton". $post_id . ".addEventListener('click', function () {
        comments$post_id.innerHTML = showComments($post_id);
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
        <div class='liked-by' >
        <div id='photoLike$post_id' style='display: flex;' >  " . printPhotosLike($arrayLike) . " </div>
            <p> Liked by <b id='userLike$post_id'>" . $userOfLiker . "</b> and <b> <b id='numberLike". $post_id . "' >"  . $numberLikes .  "</b> others</b></p>
        </div>

        <div class='caption'>
            <p> <b>" . $writer . "</b>" . " "  . $content . "</p>
            <span class='harsh-tag'>#"  . $category . "</span>
        </div>
        <div name='input-for-comment' style='margin-top:0.85rem;z-index:1 !important;display:flex;' >
            

                <input name='commentInput' type='text' id='idCommentInput$post_id' class='comment-input' placeholder='Leave a comment' aria-label='Leave a comment' aria-describedby='button-addon2'>
                <button name='sendComment' style='margin-left:1rem;background-color:white;' class='material-symbols-outlined disabled btn-addComment' for='input-for-comment' data-username='". $username ."' data-id_post='". $post_id ."'>
                    send
                </button>

        </div>
        
    </div>
    

        ";
        return $send;
    }
?>