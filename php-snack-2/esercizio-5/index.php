<?php
    $numeri = [1, 2, 3, 4, 5];
    $numeriDoppi = array_map(function($numero){
        return $numero * 2;
    }, $numeri) ;
var_dump ($numeriDoppi);
?>