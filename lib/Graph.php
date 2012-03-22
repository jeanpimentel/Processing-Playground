<?php

require_once dirname(__FILE__) . '/Vertex.php';
require_once dirname(__FILE__) . '/Edge.php';
require_once dirname(__FILE__) . '/Math.php';

class Graph
{

    private $vertexes;
    private $edges;

    public function __construct()
    {
        $this->vertexes = array();
        $this->edges = array();
    }

    /**
     * VERTEXES FUNCTIONS
     */
    public function addVertex(Vertex $v)
    {
        if(!$this->containsVertex($v))
            $this->vertexes[] = $v;
    }

    private function containsVertex($v)
    {
        foreach($this->vertexes as $vertex)
            if($vertex->equals($v))
                return TRUE;
        return FALSE;
    }

    public function getVertex($i)
    {
        if($i > 0 && $i < $this->countVertexes())
            return $this->vertexes[$i];
    }

    public function countVertexes()
    {
        return count($this->vertexes);
    }

    public function getVertexes()
    {
        return $this->vertexes;
    }

    public function printVertexes()
    {
        foreach($this->vertexes as $vertex)
            echo $vertex . PHP_EOL;
    }

    public function mapVertexesTo($width, $height)
    {

        $maxX = $maxY = -PHP_INT_MAX;
        $minX = $minY = PHP_INT_MAX;

        foreach($this->vertexes as $vertex)
        {
            $minX = min($minX, $vertex->getX());
            $minY = min($minY, $vertex->getY());
            $maxX = max($maxX, $vertex->getX());
            $maxY = max($maxY, $vertex->getY());
        }

        $distanceX = $maxX - $minX;
        $distanceY = $maxY - $minY;

        if($distanceX > $distanceY)
            $height = ceil(($width * $distanceY) / $distanceX);
        else
            $width = ceil(($height * $distanceX) / $distanceY);

        foreach($this->vertexes as &$vertex)
        {
            $vertex->setX((int) Math::map($vertex->getX(), $minX, $maxX, 0, $width));
            $vertex->setY((int) Math::map($vertex->getY(), $minY, $maxY, 0, $height));
        }

        return array($width, $height);
    }

}

?>
