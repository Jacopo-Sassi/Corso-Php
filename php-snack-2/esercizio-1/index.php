<?php
    if($_GET){
        echo "Ciao " . $_GET["nome"];
    }
    else {
        echo "Ciao Sconosciuto!";
    }
?>