<?php

    function printRequest($name, $surname, $photoProfile, $extensionProfile){
                        $send= "
                        <div class='request'>
                            <div class='info'>
                                <div class='profile-photo'>
                                    <img src='data:image/" . $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                </div>
                                <div>
                                    <h5>" . $name . " " . $surname . "</h5>
                                    <p class='text-muted'>
                                        8 mutual friends
                                    </p>
                                </div>
                            </div>
                            <div class='action'>
                                <button class='btn btn-primary'>Accept</button>
                                <button class='btn'>Decline</button>
                            </div>
                        </div>
                        ";
                        return $send;
                    }
?>