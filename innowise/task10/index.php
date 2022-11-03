<?php
require_once 'calculator.php';
$calc = new Calculator(2, 4);
$calc->add()->multiplyBy(4)->subtractBy(4);