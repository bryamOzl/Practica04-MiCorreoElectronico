<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'admin'";
    $result = $conn->query($sql);
    //$rol = isset($_POST["rol"]) ? trim($_POST["rol"]) :null;
    //if (){}
    echo $result;
    /*$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'admin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        header("Location: ../../admin/vista/admin/index.php");
    } else {
        header("Location: ../vista/login.html");
    }
    $conn->close();*/
?>