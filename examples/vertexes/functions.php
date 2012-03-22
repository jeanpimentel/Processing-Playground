<?php

function compile(Graph $graph, $name, $width, $height)
{
    $name = (empty($name) ? date('YmdHis') : $name) . '.pde';
    $date = date('Y-m-d H:i:s');
    
    $width += 200;
    $height += 100;

    $pde = "/**
* 4sq Vertexes
* Generated at: {$date}
*/

void setup()
{
  size({$width}, {$height});
  background(#c1cdc1);
  fill(#000000);
  textFont(createFont(\"sans-serif\",12,false));
}

void draw() {
";

    foreach($graph->getVertexes() as $vertex)
    {
        $pde .= sprintf('  ellipse(%d, %d, 5, 5);' . "\n", $vertex->getX() + 50, $height - $vertex->getY() - 50);
        if(isset($_GET['label']))
            $pde .= sprintf('  text("%s", %d, %d);' . "\n", $vertex->getLabel(), $vertex->getX() + 55, $height - $vertex->getY() - 45 );
    }
    $pde .= "}";

    if(is_writable(__DIR__))
        return file_put_contents(__DIR__ . '/' . $name, $pde);

    throw new Exception('Sem permissão para criar o arquivo: ' . __DIR__ . '/' . $name);
}
