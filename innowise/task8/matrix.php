<?php

class Matrix
{
    private $rows;
    private $column;
    private $matrix = [];

    public function setMatrix($matrix)
    {
        $firstRowSize = count($matrix[0]);
        foreach ($matrix as $row) {
            if ($firstRowSize !== count($row)) {
                die('Матрица некорректна!');
            }
        }
        $this->matrix = $matrix;
        $this->rows = count($matrix);
        $this->column = $firstRowSize;
    }

    public function getMatrix()
    {
        return $this->matrix;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getColumn()
    {
        return $this->column;
    }

    public static function addition(Matrix $a, Matrix $b)
    {
        if ($a->getRows() !== $b->getRows() || $a->getColumn() !== $b->getColumn()) {
            die('Складывать допускается только матрицы одинаковой размерности!');
        }
        $rows = $a->getRows();
        $column = $a->getColumn();
        $firstMatrix = $a->getMatrix();
        $secondMatrix = $b->getMatrix();
        $additionResult = [];
        for ($i = 0; $i < $column; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                $additionResult[$i][$j] = $firstMatrix[$i][$j] + $secondMatrix[$i][$j];
            }
        }
        return $additionResult;
    }

    public function multiplyByNumber($number)
    {
        $rows = $this->getRows();
        $column = $this->getColumn();
        $multiplyResult = [];
        for ($i = 0; $i < $column; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                $multiplyResult[$i][$j] = $this->matrix[$i][$j] * $number;
            }
        }
        $this->setMatrix($multiplyResult);
    }

    public static function matrixMultiplication(Matrix $a, Matrix $b)
    {
        $multiplyResult = [];
        $matrixA = $a->getMatrix();
        $matrixB = $b->getMatrix();
        $rowsA = $a->getRows();
        $columnsA = $a->getColumn();
        $columnsB = $b->getColumn();
        if ($columnsB !== $rowsA) {
            die('Матрицы несовместимы');
        }
        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $columnsB; $j++) {
                $multiplyResult[$i][$j] = 0;
                for ($k = 0; $k < $columnsA; $k++) {
                    $multiplyResult[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
            }
        }
        return $multiplyResult;
    }
    public function printMatrix()
    {
        $rows = $this->getRows();
        $columns = $this->getColumn();
        $matrix = $this->getMatrix();
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                echo $matrix[$i][$j] . ",  ";
            }
            echo "<br>";
        }
    }
}
