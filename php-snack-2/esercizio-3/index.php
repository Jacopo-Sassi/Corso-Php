<?php

    $persona = [
        "nome" => "Gino",
        "cognome" => "Panino",
        "eta" => 25
    ];

    foreach($persona as $chiave =>$valore){
        echo "$chiave: $valore <br>";
    }
?>