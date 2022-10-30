<?php
declare(strict_types=1);

include "Position.php";
include "Location.php";
include "PathFind.php";
include "Visualizer.php";


//Init Map
$grid = [
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
    ["Empty", "Obstacle", "Obstacle", "Obstacle", "Empty"],
    ["Empty", "Obstacle", "Obstacle", "Empty", "Empty"],
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
    ["Empty", "Empty", "Empty", "Empty", "Empty"],
];
//Point A
$startPoint = new Position(0,0);
//Point B
$endPoint = new Position(2,3);
// Init pathfind
$path = new PathFind($startPoint, $endPoint, $grid);

echo "Quickest Route is: ".$path->init();

// Show Grid
$visualizer = new Visualizer($startPoint, $endPoint, $grid);
$visualizer->display();
