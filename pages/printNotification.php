<?php

    function printNotification($name, $surname, $photoProfile, $extensionProfile, $notification_content, $date){
                        $send= "
                            <div>
                                <div class='profile-photo'>
                                    <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                </div>
                                <div class='notification-body'>
                                    <b>" . $name . " " . $surname . "</b> " . $notification_content . "
                                    <small class='text-muted'> " . $date . " </small>
                                </div>
                            </div>
                        ";
                        return $send;
                    }
?>