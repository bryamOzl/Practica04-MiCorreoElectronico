<?php 
    session_start(); 
    $_SESSION['isLogged'] = FALSE; 
    session_destroy(); 
    header("Location: /Practica04–MiCorreoElectronico/public/vista/login.html"); 
?>
