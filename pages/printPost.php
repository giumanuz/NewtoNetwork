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
       <div id='commentPopup" . $post_id . "' class='popup'>
       <div class='popup-content'>
           <h1 style='color:green;'>
                 GeekforGeeks !
             </h1>
           <p>This is a popup box!</p>
           <button id='closePopup" . $post_id ."'>
                 Close
             </button>
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
   });
   closePopup". $post_id .".addEventListener('click', function () {
       commentPopup" . $post_id .".classList.remove('show');
   });
   window.addEventListener('click', function (event) {
       if (event.target == commentPopup". $post_id . ") {
           commentPopup". $post_id .".classList.remove('show');
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
           <input name='commentInput' type='text' class='comment-input' placeholder='Leave a comment' aria-label='Leave a comment' aria-describedby='button-addon2'>
           <button name='sendComment' style='margin-left:1rem;background-color:white;display:none;' class='material-symbols-outlined disabled' for='input-for-comment'>
           send
           </button>
       </div>
       
   </div>
   
   
       ";
       return $send;
   }
   ?>
