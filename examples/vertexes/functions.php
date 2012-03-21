<?php

function compile(Graph $graph, $name = NULL)
{
    $name = (empty($name) ? date('YmdHis') : $name) . '.pde';
    $date = date('Y-m-d H:i:s');

    $pde = "/**
* 4sq Vertexes
* Generated at: {$date}
*/

void setup()
{
  size(1000, 1000);
  background(102);
}

void draw() {
  stroke(255);
";

    $vertexes = $graph->getVertexes();
    $pre = array_shift($vertexes);
    foreach($vertexes as $v)
    {
        $pde .= sprintf("  line(%d, %d, %d, %d);\n", $pre->getY(), $pre->getX(), $v->getY(), $v->getX());
        $pre = $v;
    }

    $pde .= "}";

    if(is_writable(__DIR__))
        return file_put_contents(__DIR__ . '/' . $name, $pde);

    throw new Exception('Sem permissão para criar o arquivo: ' . __DIR__ . '/' . $name);
}