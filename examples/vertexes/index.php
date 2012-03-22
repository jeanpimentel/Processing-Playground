<?php

require_once 'functions.php';
require_once '../../lib/Graph.php';

$json = json_decode(file_get_contents('../../4sq.json'));

$graph = new Graph();

foreach($json->response->checkins->items as $checkin)
    $graph->addVertex(new Vertex($checkin->venue->location->lng, $checkin->venue->location->lat, $checkin->venue->name));

$newSize = $graph->mapVertexesTo(1000, 1000);
compile($graph, 'onlyvertexes', $newSize[0], $newSize[1]);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Only Vertexes - Processing.js</title>
        <script src="../../processing-1.3.6.min.js"></script>
    </head>
    <body style="text-align: center; background: #c1cdc1; font-family:sans-serif;">
        <h1>Only Vertexes</h1>
        <canvas data-processing-sources="onlyvertexes.pde"></canvas>
    </body>
</html>

