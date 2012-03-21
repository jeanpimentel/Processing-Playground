<?php

class Vertex
{

    private $label;
    private $x, $y;

    public function __construct($x, $y, $label = NULL)
    {
        $this->x = $x;
        $this->y = $y;
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function equals(Vertex $other)
    {
        return ($this->getX() == $other->getX() && $this->getY() == $other->getY());
    }

    public function __toString()
    {
        return sprintf('(Vertex: %s, %s, %s)', $this->getLabel(), $this->getX(), $this->getY());
    }

}

?>
