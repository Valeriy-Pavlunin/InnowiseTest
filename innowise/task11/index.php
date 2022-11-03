<?php
require_once 'FindPath.php';
const FILENAME = "data";
$maze = [
    [0, 1, 0, 0],
    [0, 0, 1, 0],
    [1, 1, 0, 0]
];
$findPath = new FindPath();

$findPath->setSize(3, 4);
$findPath->setCoordinates(array("x" => 1, "y" => 2), array("x" => 0, "y" => 3));

$findPath->setMaze($maze);
$findPath->printMaze($findPath->getMaze());
$findPath->showPath();



FindPath::serializeObject($findPath, FILENAME);
$objects = FindPath::deserializeObject(FILENAME);

$findPath->generatingArray();
$findPath->printMaze($findPath->getMaze());
$findPath->showPath();

foreach ($objects as $object) {
   $object->showPath();
}
