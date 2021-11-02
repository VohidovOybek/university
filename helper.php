<?php

function dump($data){
    echo "<pre style='color:green;background-color:black;padding:15px;'>";
    var_dump($data);
    echo "</pre>";
}

function dd($data){
    echo "<pre style='color:green;background-color:black;padding:15px;'>";
    var_dump($data);
    echo "</pre>";
    die();
}

?>