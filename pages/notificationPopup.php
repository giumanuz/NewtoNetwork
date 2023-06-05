<div class="notification-popup" id="notificationPopup" style='display:none'>
    <div class="popup-content">
        <div class='headerComments' style='overflow:hidden;'>
            <h4>Notifications</h4>
            <button class='material-symbols-outlined topright' id='notificationClosePopup'> close </button>
        </div>
        <hr>
        <div class='popup-body'>
            <?php
            include_once 'pages/printNotification.php';

            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $user_from = $line['user_from'];
                $notification_content = $line['notification_content'];
                $date = $line['created_at'];
                $date = convertTime($date);
                $query = "SELECT * FROM users WHERE username = $1";
                $result2 = pg_query_params($dbconnession, $query, array($user_from)) or die("Query failed: " . pg_last_error());
                $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
                $first_name = $line2['first_name'];
                $surname = $line2['surname'];
                $photoProfile = $line2['photo'];
                $extensionProfile = $line2['extensionphoto'];
                echo printNotification($first_name, $surname, $photoProfile, $extensionProfile, $notification_content, $date);
            }

            ?>
        </div>
    </div>

</div>

<a class="menu-item" id="messages-notification">
    <span> <i class="uil uil-envelope"></i> </span>
    <h3>Write a message </h3>
</a>