<?php
    $numeri = [1, 5, 8, 12, 15, 20];
    $numeriMaggioriDieci = array_filter($numeri, function($numero){
        return $numero > 10;
    });

var_dump ($numeriMaggioriDieci);
?>