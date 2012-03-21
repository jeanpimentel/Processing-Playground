<?php

$plainJson = json_decode(file_get_contents('4sq.sample.json'));
$parsed = array();

foreach($plainJson->response->checkins->items as $checkin) {
    $parsed[$checkin->id] = array(
        'venue' => $checkin->venue->name,
        'lat' => $checkin->venue->location->lat,
        'lng' => $checkin->venue->location->lng,
    );
}

function normalize_with_pog(&$parsed) {
    $max_lat = $max_lng = -PHP_INT_MAX;
    $min_lat = $min_lng = PHP_INT_MAX;

    foreach($parsed as &$p) {
        $min_lat = min($min_lat, $p['lat']);
        $min_lng = min($min_lng, $p['lng']);
    }

    foreach($parsed as &$p) {
        $p['lat'] = (int) (($p['lat'] - $min_lat) * 3000);
        $p['lng'] = (int) (($p['lng'] - $min_lng) * 3000);
        $max_lat = max($max_lat, $p['lat']);
        $max_lng = max($max_lng, $p['lng']);
    }
}

header('Content-type: text/plain');
normalize_with_pog($parsed);
print_r($parsed);
