<?php

class Math
{

    static public function map($value, $inputMin, $inputMax, $outputMin, $outputMax)
    {
        return $outputMin + (($value - $inputMin) / ($inputMax - $inputMin) * ($outputMax - $outputMin));
    }

}

?>
