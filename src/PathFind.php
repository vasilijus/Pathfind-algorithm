<?php
declare(strict_types=1);
include "PathFind.php";
include "Position.php";
include "Location.php";

use PHPUnit\Framework\TestCase;

final class PathTest extends TestCase
{
    public function testOne(): void
    {
        $grid = [
            ["Empty", "Empty", "Empty", "Empty", "Empty"],
            ["Empty", "Obstacle", "Obstacle", "Obstacle", "Empty"],
            ["Empty", "Obstacle", "Obstacle", "Empty", "Empty"],
            ["Empty", "Empty", "Empty", "Empty", "Empty"],
            ["Empty", "Empty", "Empty", "Empty", "Empty"],
        ];
        $A = new Position(1,0);
        $B = new Position(2,3);

        $modelMock = \Mockery::mock('Model');

        $path = new PathFind($A, $B, $grid);

        $modelMock
            ->shouldReceive('search')
            ->andReturn(6);

        $result = $path->init();

        $this->assertEquals(6 , $path->init());

        \Mockery::close();
    }

}
