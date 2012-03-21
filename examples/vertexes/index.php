<?php

require_once 'functions.php';
require_once '../../lib/Graph.php';

$json = json_decode(file_get_contents('../../4sq.json'));

$graph = new Graph();

foreach($json->response->checkins->items as $checkin)
    $graph->addVertex(new Vertex($checkin->venue->location->lng, $checkin->venue->location->lat, $checkin->venue->name));

header('Content-Type: text/plain; charset=utf-8');
//$graph->printVertexes();

$newSize = $graph->mapVertexesTo(800, 600);

//$graph->printVertexes();

compile($graph, 'onlyvertexes', $newSize[0], $newSize[1]);

readfile('onlyvertexes.pde')
?>
