<?php
class FindPath
{
    private  $maze = [];
    private  $rows = 10;
    private  $columns = 10;
    private  $a = [];
    private  $b = [];

    public function __construct()
    {
    }

    public function getMaze()
    {
        return $this->maze;
    }

    public function setMaze($maze)
    {
        $this->maze = $maze;
    }

    public function setCoordinates($a, $b)
    {
        if ($b['x'] < $this->rows && $b['y'] < $this->columns) {
            $this->a = $b;
        } else {
            return false;
        }
        if ($a['x'] < $this->rows && $a['y'] < $this->columns) {
            $this->b = $a;
        } else {
            return false;
        }
        return true;
    }

    public function setSize($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function showPath()
    {
        if (!$this->maze || !$this->a || !$this->b) {
            die('Лабиринт или координаты не созданы!' . '<br>');
        }
        $paths = $this->findShortestPath();
        if ($paths) {
            $cur_node = $this->b;
            echo   '<br>' . "Путь из A:({$this->b['x']},{$this->b['y']}) в B:({$this->a['x']},{$this->a['y']}): " . '<br>' . "({$cur_node['x']},{$cur_node['y']}) ";
            while ($cur_node != $this->a) {
                $cur_node = $this->getNode($paths, $cur_node);
                echo ": ({$cur_node['x']},{$cur_node['y']})";
            }
            echo "<br>";
        } else {
            echo   '<br>' . 'Нет пути из А в B'  . '<br>';
        }
    }

    public function generatingArray()
    {
        if (!$this->a || !$this->b) {
            die('Установите координаты!' . '<br>');
        }
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $this->maze[$i][$j] = rand(0, 1);
            }
        }
        $this->maze[$this->b['x']][$this->b['y']] = 0;
    }

    public function printMaze($maze)
    {
        if (!$this->maze) {
            die('Создайте лабиринт' . '<br>');
        }

        foreach ($maze as $row) {
            foreach ($row as $point) {
                echo $point . ' ';
            }
            echo '<br>';
        }
    }

    private function findShortestPath()
    {
        $queue[] = $this->a;
        $cameFrom[] = ['from' => 0, 'to' => $this->a];

        while ($queue) {
            $cur_node = array_pop($queue);

            if ($cur_node === $this->b) {
                return $cameFrom;
            }

            $next_nodes = $this->getNeighbours($cur_node, $this->maze);
            foreach ($next_nodes as $next_node) {
                if (!$this->inArray($next_node, $cameFrom)) {
                    $queue[] = $next_node;
                    $cameFrom[] = ['from' => $cur_node, 'to' => $next_node];
                }
            }
        }
        return [];
    }

    private function getNode($array, $cur_node)
    {
        foreach ($array as $item) {
            if ($item['to'] === $cur_node)
                return $item['from'];
        }
        return [];
    }

    private function inArray($next_node, $visited)
    {
        foreach ($visited as $item) {
            if ($item['from'] == $next_node)
                return true;
        }
        return false;
    }

    private function getNeighbours($current, $maze)
    {
        $x = $current['x'];
        $y = $current['y'];
        $res = [];
        if ($x !== 0) {
            if ($maze[$x - 1][$y] === 0)
                $res[] = ['x' => $x - 1, 'y' => $y];
        }
        if ($x !== count($maze) - 1) {
            if ($maze[$x + 1][$y] === 0)
                $res[] = ['x' => $x + 1, 'y' => $y];
        }
        if ($y !== 0) {
            if ($maze[$x][$y - 1] === 0)
                $res[] = ['x' => $x, 'y' => $y - 1];
        }
        if ($y !== count($maze[0]) - 1) {
            if ($maze[$x][$y + 1] === 0)
                $res[] = ['x' => $x, 'y' => $y + 1];
        }
        return $res;
    }

    public static function serializeObject($obj, $filename)
    {
        if (!$fd = fopen($filename, 'a+')) {
            echo "Невозможно открыть файл ($filename)";
            exit;
        }
        $serializedObject = serialize($obj);
        if (fwrite($fd, $serializedObject) === false) {
            die("Невозможно записать в файл ($filename)");
        }
        fclose($fd);
    }

    public static function deserializeObject($filename)
    {
        $fd = fopen($filename, 'r');
        if (!$fd) {
            die("Невозможно открыть файл ($filename)");
        }
        $objects = [];
        while (!feof($fd)) {
            $objects[] = unserialize(fgets($fd));
        }
        fclose($fd);
        return $objects;
    }
}
