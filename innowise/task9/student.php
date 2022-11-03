<?php

class Student{
    protected  $firstName;
    protected $lastName;
    protected  $groupe;
    protected $averageMark;

    public function __construct(string $firstName, string $lastName, int $groupe, float $averageMark)
    {
        if($firstName === '' || $lastName === '' || $groupe < 0 || $averageMark < 0 || $averageMark > 5){
            die('Некорректные данные!');
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->groupe = $groupe;
        $this ->averageMark = $averageMark;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getGroupe(){
        return $this->groupe;
    }
    public function getAverageMark(){
        return $this->averageMark;
    }
    public function getScholarship(){
        if($this->averageMark == 5){
            return 100;
        }else{
            return 80;
        }
    }

}