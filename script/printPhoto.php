<?php

    function printPhoto($photo, $extension){
        return "<span> 
                    <img src='data:image/". $extension . ";base64," . $photo . "' alt='Binary Image'>
                </span>";
    }

    function printPhotosLike($array){
        $send = "";
        foreach($array as $photo){
            $send = $send . printPhoto($photo[0], $photo[1]);
        }
        return $send;
    }

?>