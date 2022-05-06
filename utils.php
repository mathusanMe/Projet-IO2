<?php
    function rating_to_emoji($rating) {
        $name = "fa-solid fa-face-";
        switch ($rating) {
            case 1:
                $name .= "tired";
                break;
            case 2:
                $name .= "frown";
                break;
            case 3:
                $name .= "meh";
                break;
            case 4:
                $name .= "smile";
                break;
            case 5:
                $name .= "laugh-squint";
                break;
        }
        return $name;
    }

    function style_emoji($rating) {
        $color = "#";
        switch ($rating) {
            case 1:
                $color .= "e12025";
                break;
            case 2:
                $color .= "f25a29";
                break;
            case 3:
                $color .= "fab140";
                break;
            case 4:
                $color .= "91ca5f";
                break;
            case 5:
                $color .= "3ab54a";
                break;
        }
        return $color;
    } 
?>