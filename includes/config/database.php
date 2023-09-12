<?php

function connectDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'jupg25', 'realestate_crud');

    if(!$db) {
        echo "Error, no se pudo conectar con la base de datos";
        exit;
    }
    
    return $db;
}

?>