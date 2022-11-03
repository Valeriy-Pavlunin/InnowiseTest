<?php
function deleteElementFromArray($array, $position)
{
    $result = [];
    for ($i = 0, $j = 0; $i < count($array); $i++) {
        if ($i !== $position) {
            $result[$j] = $array[$i];
            $j++;
        }
    }
    return $result;
}

