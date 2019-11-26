<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
    //$rol = isset($_POST["rol"]) ? trim($_POST["rol"]) :null;
    //if (){}
    echo $result;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_rol = 'admin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['cod'] = "$row[usu_codigo]";
            $_SESSION['nom'] = "$row[usu_nombres]";
            $_SESSION['ape'] = "$row[usu_apellidos]";
            $_SESSION['el'] = "$row[usu_eliminado]";
            $_SESSION['cor'] = "$usuario";
            $_SESSION['rol'] = "$row[usu_rol]";
        }
        $_SESSION['isLogged'] = TRUE;
        if(){
            header("Location: ../../admin/vista/admin/index.php");
        }else {
            header("Location: ../../admin/vista/user/index.php");
        }  
    }else {
        header("Location: ../vista/login.html");
    }
    $conn->close();
?>