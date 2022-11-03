<?php
function sumOfDigits($inputNumber)
{
    $result = 0;
    while ($inputNumber !== 0) {
        $result += $inputNumber % 10;
        $inputNumber = (int) ($inputNumber / 10);

    }
    if ((int)($result / 10) !== 0) {
        return sumOfDigits($result);
    } else {
        return $result;
    }
}
