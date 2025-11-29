<?php

function lessTitle(string $title): string
{
    $title = str_split($title);
    $new = "";
    $spaces = 0;
    for ($i = 0; $i < count($title); $i++) {
        if (" " == $title[$i]) {
            $spaces++;
            $new .= $title[$i];
        } else {
            $new .= $title[$i];
        }
        if ($spaces > 9) {
            break;
        }
    }
    return $new;
}