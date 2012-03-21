<?php

class Edge
{

    private $vertexSrc, $vertexDst;
    private $weight;

    public function __construct(Vertex $vertexSrc, Vertex $vertexDst, $weight)
    {
        $this->vertexSrc = $vertexSrc;
        $this->vertexDst = $vertexDst;
        $this->weight = $weight;
    }

    public function getVertexSrc()
    {
        return $this->vertexSrc;
    }

    public function setVertexSrc($vertexSrc)
    {
        $this->vertexSrc = $vertexSrc;
    }

    public function getVertexDst()
    {
        return $this->vertexDst;
    }

    public function setVertexDst($vertexDst)
    {
        $this->vertexDst = $vertexDst;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

}

?>
