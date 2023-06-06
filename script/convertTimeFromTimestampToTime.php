<?php


    function convertTime($time){ 
        $time=strtotime($time);
        $time = time() - $time;     
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        if ($time < 60) {
            return $time . ' seconds';
        }
    
        foreach ($tokens as $unit => $text) { 
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }

?>