<?php

require_once dirname(__FILE__) . '/../../lib/Edge.php';

class EdgeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Edge
     */
    protected $edge;

    /**
     * @var Vertex
     */
    protected $vertexSrc, $vertexDst;

    protected function setUp()
    {
        $this->vertexSrc = new Vertex(1, 2);
        $this->vertexDst = new Vertex(3, 4);
        $this->edge = new Edge($this->vertexSrc, $this->vertexDst, 5);
    }

    public function testGetVertexSrc()
    {
        $this->assertEquals($this->vertexSrc, $this->edge->getVertexSrc());
    }

    public function testSetVertexSrc()
    {
        $this->vertexSrc = new Vertex(6, 10);
        $this->edge->setVertexSrc($this->vertexSrc);
        $this->assertEquals($this->vertexSrc, $this->edge->getVertexSrc());
    }

    public function testGetVertexDst()
    {
        $this->assertEquals($this->vertexDst, $this->edge->getVertexDst());
    }

    public function testSetVertexDst()
    {
        $this->vertexDst = new Vertex(7, 4);
        $this->edge->setVertexDst($this->vertexDst);
        $this->assertEquals($this->vertexDst, $this->edge->getVertexDst());
    }

    public function testGetWeight()
    {
        $this->assertEquals(5, $this->edge->getWeight());
    }

    public function testSetWeight()
    {
        $this->edge->setWeight(4);
        $this->assertEquals(4, $this->edge->getWeight());
    }

}

?>
