<?php

require_once dirname(__FILE__) . '/Vertex.php';
require_once dirname(__FILE__) . '/Edge.php';

class Graph
{

    private $vertexes;
    private $edges;

    public function __construct()
    {
        $this->vertexes = array();
        $this->edges = array();
    }

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

    public function getVertexes() {
        return $this->vertexes;
    }

    public function printVertexes()
    {
        foreach($this->vertexes as $vertex)
            echo $vertex . PHP_EOL;
    }

}

?>
