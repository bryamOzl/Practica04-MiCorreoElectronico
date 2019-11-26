<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <form id="formulario01" method="POST" action="../controladores/crear_usuario.php">
        <label for="cedula">Cedula (*)</label>
        <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..." required />
        <br>
        <label for="nombres">Nombres (*)</label>
        <input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres ..." required />
        <br>
        <label for="apellidos">Apelidos (*)</label>
        <input type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese sus dos apellidos ..." required />
        <br>
        <label for="direccion">Dirección (*)</label>
        <input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección ..." required />
        <br>
        <label for="telefono">Teléfono (*)</label> 
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su número telefónico ..." required /> 
        <br> 
        <label for="fecha">Fecha Nacimiento (*)</label> 
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" placeholder="Ingrese su fecha de nacimiento ..." required /> 
        <br> 
        <label for="correo">Correo electrónico (*)</label> 
        <input type="email" id="correo" name="correo" value="" placeholder="Ingrese su correo electrónico ..." required /> 
        <br> 
        <label for="rol">Rol de Usuario (*)</label> 
        <input type="text" id="rol" name="rol" value="" placeholder="Ingrese el rol de usuario ..." required /> 
        <br> 
        <label for="correo">Contraseña (*)</label>
        <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña ..." required /> 
        <br> 
        <input type="submit" id="crear" name="crear" value="Aceptar" /> 
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> 
    </form>
</body>

</html>