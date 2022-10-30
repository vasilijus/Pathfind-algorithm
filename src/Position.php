<?php

/**
 * Position X , Y
 */
class Position
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getCoords(): array
    {
        return [$this->x, $this->y];
    }
}

?>