<?php
    $db_servername="localhost";
    $db_username="root";
    $db_passwrod="";
    $db_name="hypermedial";

    $conn= new mysqli($db_servername,$db_username,$db_passwrod,$db_name);
    $conn->set_charset("utf8");

    #Probar conexion

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    #}else{
    #    echo"<p>Conexion exitosa</p>";
    }
?>