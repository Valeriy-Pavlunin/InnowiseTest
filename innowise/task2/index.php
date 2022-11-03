<?php
function birthdayCountdown($birth_date){
    $now = time();
    $birthday = strtotime($birth_date);
    $difference = ($birthday - $now) / 3600 / 24 + 1;
    return round($difference);

}

echo birthdayCountdown('15-09-2023');