<?php

    function printPost($writer, $content, $photo, $time){
                        $send= "
                        <div class='feed'>
                        <div class='head'>
                            <div class='user'>
                            <div class='profile-photo'>
                                <img src='/images/profile-13.jpg'>
                            </div>
                            <div class='info'>
                                <h3>" . $writer . "</h3>
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
                            <span><i class='uil uil-heart'></i></span>
                            <span><i class='uil uil-comment'></i></span>
                            <span><i class='uil uil-share-alt'></i></span>
    
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
                            <p> <b>" . $writer . "</b>"  . $content . "</p>
                            <span class='harsh-tag'>#lifestyle</span>
                        </div>
    
                        <div class='comments text-muted'>View all 277 comments</div>
                    </div>
                        ";
                        return $send;
                    }
?>