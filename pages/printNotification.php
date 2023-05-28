<?php

    function printNotification($name, $surname, $photoProfile, $extensionProfile, $notification_content, $date){
                        $send= "
                            <div style='display:flex'>
                                <div class='profile-photo'>
                                    <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                </div>
                                <div class='notification-body' style='margin-left:1rem;margin-top:0.8rem'>
                                    <b>" . $name . " " . $surname . "</b> " . $notification_content . "
                                    <small class='text-muted'> " . $date . " </small>
                                </div>
                            </div>
                            <hr>
                        ";
                        return $send;
                    }
?>