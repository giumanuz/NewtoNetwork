<div id='friendsPopup' class='friends-popup'>
    <div class='popup-content' style='max-height:25rem;'>
        <div class='headerComments'>
            <h4>Make new friends </h4>
            <button class='material-symbols-outlined topright' id='closefriendsPopup'> close </button>
        </div>
        <div class="search-bar">
            <i class="uil uil-search"></i>
            <input type="search" style="width: 10rem;margin-top:1rem;margin-bottom:1rem;" placeholder="Search profiles"
                   id="profile-search">

        </div>
        <hr>
        <?php
        $toShow='';

        $query2 = "SELECT * FROM users";
        $result2 = pg_query($dbconnession, $query2) or die("Query failed: " . pg_last_error());
        while ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)) {
            $username2 = $line2['username'];
            if($username2 === $username){ continue;}
            $photoProfile = $line2['photo'];
            $first_name2 = $line2['first_name'];
            $extensionProfile = $line2['extensionphoto'];
            $surname2 = $line2['surname'];
            $query3 = "SELECT * FROM friend_requests WHERE (sender = $1 AND receiver = $2) OR (sender = $2 AND receiver = $1)";
            $result3 = pg_query_params($dbconnession,$query3,array($username,$username2)) or die("Query failed: " . pg_last_error());
            $icon = 'add_circle';
            if($line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
                $icon = 'hourglass_empty';
            }

            $query3 = "SELECT * FROM friends WHERE (user_id = $1 AND friend_user_id = $2) OR (user_id = $2 AND friend_user_id = $1)";
            $result3 = pg_query_params($dbconnession,$query3,array($username,$username2)) or die("Query failed: " . pg_last_error());
            if($line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
                continue;
            }

            $toShow = $toShow . " 
                                    <div class='profile profile-to-search'>
                                        <div class='profile-photo'>
                                            <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                                        </div>
                                        <div class='handle'>
                                            <h4 style='color: var(--color-primary);font-size:1.4rem;'>
                                                " . $first_name2 . " " . $surname2 . "
                                            </h4>
                                            <p class='text-muted'>
                                                @" . $username2 . "
                                            </p>
                                        </div>
                                        <div class='buttons' style='margin-left:auto;'>
                                            <button name='addButton' usern='". $username . "' friend='". $username2 . "' class='material-symbols-outlined' style='left:4rem;background:none;border:none;text-align:right;'>
                                            " . $icon . "
                                            </button>
                                        </div>
                                    </div>";
        }
        echo $toShow;
        ?>
    </div>
</div>