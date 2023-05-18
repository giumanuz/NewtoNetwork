<?php

    function printRequest($name, $surname, $photoProfile, $extensionProfile, $username, $mutalFriends){
                        $send= "
                        <div class='request'>
                            <div class='info'>
                                <div class='profile-photo'>
                                    
                                    <img src='data:image/" . $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                </div>
                                <div>
                                    <h5>" . $name . " " . $surname . "</h5>
                                    <p class='text-muted'>
                                    " . $mutalFriends . " mutual friends
                                    </p>
                                </div>
                            </div>
                            <div class='action'>
                                <button class='btn btn-primary btn-accept' style='border:none;background-color: var( --color-primary);' data-username='". $username ."'>Accept</button>
                                <button class='btn btn-decline' style='border:none;background-color: var( --color-gray);' data-username='". $username ."'>Decline</button>
                            </div>
                        </div>
                        ";
                        return $send;
                    }
?>