<?php

/**
 * Visualizer A, B, Map
 */
class Visualizer
{
    public $x;
    public $y;
    public $z;

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function display()
    {
        $this->z[$this->x->x][$this->x->y] = "Start";
        $this->z[$this->y->x][$this->y->y] = "Goal";

        echo "<br>";
        // Visualize the Grid
        for ($i = 0, $iMax = count($this->z); $i < $iMax; $i++) {
            // var_dump( $grid[$i] );
            echo " [---]";
            for ($j = 0, $jMax = count($this->z); $j < $jMax; $j++) {
                if ($this->z[$i][$j] === 'Start') {
                    echo "[S.]";
                } elseif ($this->z[$i][$j] === 'Goal') {
                    echo "[G.]";
                } elseif ($this->z[$i][$j] === 'Obstacle') {
                    echo "[# ]";
                } else {
                    echo "[---]";
                }
            }
            echo "<br>";
        }
    }
}

?>