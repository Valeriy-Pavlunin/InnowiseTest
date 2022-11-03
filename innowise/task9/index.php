<?php

require_once 'aspirant.php';

$student1 = new Student('Ivan', 'Ivanov', 12, 5);
$student2 = new Student('Pavel', 'Pavlov', 110, 3.5);
$aspirant1 = new Aspirant('Anna', 'Sokolova', 512, 5);
$aspirant2 = new Aspirant('Viktor', 'Kuznecov', 100, 2.3);
$arrayOfStudents = [$student1, $student2, $aspirant1, $aspirant2];
foreach($arrayOfStudents as $student){
    echo $student->getFirstName() . ': ' . $student->getScholarship() . "<br>";
}
