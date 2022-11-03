<?php
require_once 'student.php';
class Aspirant extends Student{
    public function getScholarship()
    {
        if($this->averageMark == 5){
            return 200;
        }else{
            return 180;
        }
    }
}