<?php
if (isset($_GET['category']) && $_GET['category'] != "") {
    $category = $_GET['category'];
    $query = "SELECT * FROM posts WHERE category = '$category' or writer = '$category' ORDER BY created_at DESC";
} else {
    $query = "SELECT * FROM posts ORDER BY created_at DESC";
}
$result = pg_query($dbconnession, $query);
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $writer = $line['writer'];
    $post_id = $line['post_id'];
    $content = $line['post_content'];
    $photo = $line['photo'];
    $time = $line['created_at'];
    $category = $line['category'];
    $time = convertTime($time);
    $query = "SELECT * FROM users WHERE username = '$writer'";
    $result2 = pg_query($dbconnession, $query);
    $line = pg_fetch_array($result2, null, PGSQL_ASSOC);
    $photoProfileFeed = $line['photo'];
    $extensionProfileFeed = $line['extensionphoto'];
    $class = "";
    $query3 = "SELECT * FROM likes WHERE post_id = '$post_id' AND user_id = '$username'";
    $result3 = pg_query($dbconnession, $query3);
    if (pg_num_rows($result3) == 1) {
        $class = "active";
    }
    $query4 = "SELECT * FROM likes WHERE post_id = $1";
    $result4 = pg_query_params($dbconnession, $query4, array($post_id));
    $likes = pg_num_rows($result4) -1;



    $arrayLike = returnPhotoLike($dbconnession, $post_id);
    $userOfLiker = returnPersonLike($dbconnession, $post_id);


    echo printPost($post_id, $writer, $content, $photo, $time, $photoProfileFeed, $extensionProfileFeed, $class, $username, $category, $likes, $arrayLike , $userOfLiker);
}
echo "</div>
                        </div>";
