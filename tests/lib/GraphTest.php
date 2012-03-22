<?php

require_once dirname(__FILE__) . '/../../lib/Graph.php';

class GraphTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Graph
     */
    protected $graph;

    /**
     * @var Vertex
     */
    protected $vertex;

    protected function setUp()
    {
        $this->graph = new Graph();
        $this->vertex = new Vertex(1, 2, 'myLabel');
    }

    public function testEmptyVertexes()
    {
        $this->assertEquals(0, $this->graph->countVertexes());
    }

    public function testAddVertexes()
    {
        $this->graph->addVertex($this->vertex);
        $this->assertEquals(1, $this->graph->countVertexes());
    }

}

?>
