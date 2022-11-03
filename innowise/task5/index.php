<?php

function generateSequence($a, $b)
{

    if ($a === $b) {
        echo $a;
    } elseif ($b > $a) {
        echo $a . ", ";
        generateSequence($a+1, $b);
    } else {
        echo $a . ", ";
        generateSequence($a-1, $b);
    }
}


