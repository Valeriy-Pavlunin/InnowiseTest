<?php
function convertString(string $input)
{
    $result = '';
    $input = trim($input);
    $words = preg_split("/[\s-_]+/", $input);
    foreach ($words as $word) {
        $result .= ucfirst($word);
    }
    return $result;
}

