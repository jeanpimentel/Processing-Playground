<?php

require_once dirname(__FILE__) . '/../../lib/Vertex.php';

class VertexTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Vertex
     */
    protected $vertex;

    protected function setUp()
    {
        $this->vertex = new Vertex(1, 2);
    }

    public function testGetX()
    {
        $this->assertEquals(1, $this->vertex->getX());
    }

    public function testSetX()
    {
        $this->vertex->setX(3);
        $this->assertEquals(3, $this->vertex->getX());
    }

    public function testGetY()
    {
        $this->assertEquals(2, $this->vertex->getY());
    }

    public function testSetY()
    {
        $this->vertex->setY(4);
        $this->assertEquals(4, $this->vertex->getY());
    }

    public function testEquals()
    {
        $this->vertex = new Vertex(1,2);
        $this->assertTrue($this->vertex->equals(new Vertex(1,2)));
    }

    public function testNotEquals()
    {
        $this->vertex = new Vertex(2,1);
        $this->assertFalse($this->vertex->equals(new Vertex(1,2)));
    }

}

?>
