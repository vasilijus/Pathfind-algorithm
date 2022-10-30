<?php

class Location {

    /** @var int */
    public $distFromTop;
    /** @var int */
    public $distFromLeft;
    /** @var array */
    public $path = [];
    /** @var string */
    public $status = 'Start';

    public function __construct($top, $left, $path, $status)
    {
        $this->distFromTop = $top;
        $this->distFromLeft = $left;
        $this->path = $path;
        $this->status = $status;
    }
}

?>
