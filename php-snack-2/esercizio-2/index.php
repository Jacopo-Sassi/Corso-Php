<?php
    if(isset($_GET["min"]) && $_GET["min"]<=20)
    for($i= $_GET["min"]; $i<= 20; $i++){
        echo "$i ";
    }
    elseif (isset($_GET["min"]) && $_GET["min"]>=21){
        echo "Il numero deve essere minore o uguale a 20";
    }
    else {
        for($i=1; $i<= 20; $i++){
            echo "$i ";
    }
}
?>