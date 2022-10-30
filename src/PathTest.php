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

        $path = new PathFind($A, $B, $grid);

        $postId = 42;

        $modelMock = \Mockery::mock('Model');
        $modelMock->shouldReceive('init')
            ->with($A,$B, $grid)
            ->once();

        $service = new PathFind($A, $B, $grid);
        $service->init();

        \Mockery::close();
    }

}
