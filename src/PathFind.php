<?php

/**
 * PathFind X , Y, Z
 */
class PathFind
{
    public $posX;
    public $posY;
    public $grid;

    public function __construct($posX, $posY, $grid)
    {
        $this->posX = $posX;
        $this->posY = $posY;
        $this->grid = $grid;
    }

    public function init()
    {
        return $this->search(
            $this->posX, $this->posY, $this->grid
        );
    }

    public function search($startCoords, $endCoords, $grid)
    {
        $distFromTop = $startCoords->x;
        $distFromLeft = $startCoords->y;

        $grid[$endCoords->x][$endCoords->y] = 'Goal';
        $grid[$startCoords->x][$startCoords->y] = 'Start';

        // Each loc will store its coords and the shortest path
        $location = new Location($distFromTop, $distFromLeft, [], 'Start');
        // init queue
        $queue = array($location);
        //loop grid searching for goal
        while (count($queue) > 0) {
            $directions = ["North", "East", "South", "West"];
            $currentLocation = array_shift($queue);

            foreach($directions as $k => $value)
            {
                $newLocation = $this->exploreInDirection($currentLocation, $value, $grid);

                if ($newLocation->status === 'Goal') {
                    return count( $newLocation->path );
                } elseif ($newLocation->status === 'Valid') {
                    $queue[] = $newLocation;
                }
            }
        }

        //  No valid path
        return false;
    }

    public function locationStatus(Location $location, array $grid): string
    {
        $gridSize = count($grid);
        $dft = $location->distFromTop;
        $dfl = $location->distFromLeft;
        if ($location->distFromLeft < 0 || $location->distFromTop >= $gridSize || $location->distFromTop < 0 || $location->distFromTop >= $gridSize ) {
            return "Invalid";
        } elseif ($grid[$dft][$dfl] === 'Goal') {
            return "Goal";
        } elseif ($grid[$dft][$dfl] !== "Empty") {
            // Location is Obstacle or visited
            return "Blocked";
        } else {
            return "Valid";
        }
    }

    public function exploreInDirection(Location $currentLocation, string $direction, array $grid): Location
    {
        $newPath = array_slice($currentLocation->path, 0);
        array_push($newPath, $direction);

        $dft = $currentLocation->distFromTop;
        $dfl = $currentLocation->distFromLeft;

        if ($direction === 'North') {
            $dft -= 1;
        } elseif ($direction === 'East') {
            $dfl += 1;
        } elseif ($direction === 'South') {
            $dft += 1;
        } elseif ($direction === 'West') {
            $dfl -= 1;
        }

        $newLocation = new Location($dft, $dfl, $newPath, 'Unknown');
        $newLocation->status = $this->locationStatus($newLocation, $grid);

        // If this new location is valid, mark it as "Visited"
        if ($newLocation->status === 'Valid') {
            $grid[$newLocation->distFromTop][$newLocation->distFromLeft] = "Visited";
        }

        return $newLocation;
    }
}

?>