<?php
    define("hostname","localhost");
    define("user","id21905470_upooluser");
    define("password","Upool2025?");
    define("database","id21905470_bd_upool");
    function query($query){
        $cnn = mysqli_connect(hostname, user, password, database);
        if (mysqli_connect_errno()){
            printf("Conexión al servidor de base de datos ha fallado: %s\n", mysqli_connect_error());
            exit();
        }
        $res = mysqli_query($cnn, $query);
        $cnn->close();
        return $res;
    }
?>