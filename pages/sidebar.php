<div class="sidebar" style="">
    <a class="menu-item active">
        <span> <i class="uil uil-home-alt"></i> </span>
        <h3>Home </h3>
    </a>

    <a class="menu-item" id="notifications">
        <?php
        $query = "SELECT * FROM notifications WHERE user_to = $1 ORDER BY created_at DESC";
        $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
        $num_rows = pg_num_rows($result);
        if ($num_rows > 0) {
            echo "<span> <i class='uil uil-bell'><small class='notifications-count'>$num_rows</small></i> </span>";
        } else {
            echo "<span> <i class='uil uil-bell'></i> </span>";
        }
        ?>
        <h3>Notifications </h3>
    </a>

    <!----------NOTIFICATION POPUP ------------>
    <?php
    include_once 'pages/notificationPopup.php';
    ?>
</div>
