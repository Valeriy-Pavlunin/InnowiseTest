<?php
class Calculator
{
    private $firstNumber;
    private $secondNumber;
    private $calculationResult;
    public function __construct(float $firstNumber, float $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
    }

    public function add()
    {
        $this->calculationResult =  $this->firstNumber + $this->secondNumber;
        echo $this->calculationResult;
        return $this;
    }

    public function multiply()
    {
        $this->calculationResult = $this->firstNumber * $this->secondNumber;
        echo $this->calculationResult;
        return $this;
    }
    public function devide()
    {
        $this->calculationResult = $this->firstNumber / $this->secondNumber;
        echo $this->calculationResult;
        return $this;
    }
    public function subtract()
    {
        $this->calculationResult = $this->firstNumber - $this->secondNumber;
        echo $this->calculationResult;
        return $this;
    }

    public function addBy(float $number)
    {
        ob_clean();
        $this->calculationResult = $this->calculationResult + $number;
        echo $this->calculationResult;
        return $this;
    }

    public function multiplyBy(float $number)
    {
        ob_clean();
        $this->calculationResult = $this->calculationResult * $number;
        echo $this->calculationResult;
        return $this;
    }

    public function devideBy(float $number)
    {
        ob_clean();
        $this->calculationResult = $this->calculationResult / $number;
        echo $this->calculationResult;
        return $this;
    }

    public function subtractBy(float $number)
    {
        ob_clean();
        $this->calculationResult = $this->calculationResult - $number;
        echo $this->calculationResult;
        return $this;
    }
}
