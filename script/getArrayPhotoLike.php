<?php
function returnPhotoLike($dbconnession, $post_id)
{
    $arrayLike = array();
    $query5 = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 3";
    $result5 = pg_query_params($dbconnession, $query5, array($post_id));
    // create a array to store the photo and the extension of the users who liked the post
    while ($line5 = pg_fetch_array($result5, null, PGSQL_ASSOC)) {
        $userOfLiker = $line5['user_id'];
        $query6 = "SELECT * FROM users WHERE username = $1";
        $result6 = pg_query_params($dbconnession, $query6, array($userOfLiker));
        $line6 = pg_fetch_array($result6, null, PGSQL_ASSOC);
        $photoOfLiker = $line6['photo'];
        $extensionOfLiker = $line6['extensionphoto'];
        $arrayLike[] = array($photoOfLiker, $extensionOfLiker);
    }
    return $arrayLike;
}

function returnPersonLike($dbconnession, $post_id)
{
    $query6 = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 1";
    $result6 = pg_query_params($dbconnession, $query6, array($post_id));
    $line6 = pg_fetch_array($result6, null, PGSQL_ASSOC);
    if ($line6 == false) {
        return null;
    }
    $userOfLiker = $line6['user_id'];
    return $userOfLiker;
}
?>