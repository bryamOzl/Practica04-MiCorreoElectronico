<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena') and usu_eliminado='n'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['codigo'] = "$row[usu_codigo]";
            $_SESSION['nombres'] = "$row[usu_nombres]";
            $_SESSION['apelidos'] = "$row[usu_apellidos]";
            $_SESSION['eliminado'] = "$row[usu_eliminado]";
            $_SESSION['correo'] = "$usuario";
            $_SESSION['rol'] = "$row[usu_rol]";
        }
        $_SESSION['isLogged'] = TRUE;
        if($_SESSION['rol'] == "ADMIN"|| $_SESSION['rol'] == "admin"){
            header("Location: ../../admin/vista/admin/index.php");
        }else if ($_SESSION['rol'] == "USER" || $_SESSION['rol'] == "user"){
            header("Location: ../../admin/vista/user/index.php");
        }  
    }else {
        header("Location: ../vista/login.html");
    }
    $conn->close();
?>