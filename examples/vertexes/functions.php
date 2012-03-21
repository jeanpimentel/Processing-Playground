<?php

function compile(Graph $graph, $name, $width, $height)
{
    $name = (empty($name) ? date('YmdHis') : $name) . '.pde';
    $date = date('Y-m-d H:i:s');

    $width += 100;
    $height += 100;

    $pde = "/**
* 4sq Vertexes
* Generated at: {$date}
*/

void setup()
{
  size({$width}, {$height});
  background(102);
}

void draw() {
";

    foreach($graph->getVertexes() as $vertex)
    {
        $pde .= sprintf('  ellipse(%d, %d, 5, 5);' . "\n", $vertex->getX() + 50, $vertex->getY() + 50);
        $pde .= sprintf('  text("(%d, %d, %s)", %d, %d);' . "\n", $vertex->getX(), $vertex->getY(), $vertex->getLabel(), $vertex->getX() + 55, $vertex->getY() + 55);
    }
    $pde .= "}";

    if(is_writable(__DIR__))
        return file_put_contents(__DIR__ . '/' . $name, $pde);

    throw new Exception('Sem permissão para criar o arquivo: ' . __DIR__ . '/' . $name);
}