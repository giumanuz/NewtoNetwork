<?php

    function printMessage($sender, $message, $photo, $extensionPhoto){
        $send= "
            <div class='message'>
            <div class='profile-photo'>
                <img src='data:image/" . $extensionPhoto . ";base64," . $photo . "' alt='Binary Image'>
                <div class='active'></div>
            </div>
            <div class='message-body'>
                <h5>" . $sender . "</h5>
                <p class='text-muted'>" . $message . "</p>
            </div>
        </div>
        ";
        return $send;
    }

?>