<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Reunion</title>
</head>

<body>
    <form id="formulario01" method="POST" action="../../controladores/user/crear_reunion.php">
        <label for="fecha">Fecha de Reunion (*)</label> 
        <input type="date" id="fecha" name="fecha" value="" placeholder="Ingrese su fecha de la reunion ..." required />
        <br>
        <label for="hora">Hora (*)</label>
        <input type="text" id="hora" name="hora" value="" placeholder="Ingrese la hora de la reunion ..." required />
        <br>
        <label for="lugar">Lugar  (*)</label>
        <input type="text" id="lugar" name="lugar" value="" placeholder="Ingrese el lugar de la reunion ..." required />
        <br>
        <label for="coordenadas">Coordenadas (*)</label>
        <input type="text" id="cordenadas" name="coordenadas" value="" placeholder="Ingrese las coordenadas ..." required />
        <br>
        <label for="remitente">Remitente (*)</label> 
        <input type="text" id="remitente" name="remitente" value="" placeholder="Ingrese el remitente ..." required /> 
        <br> 
        <label for="motivo">Motivo (*)</label> 
        <input type="text" id="motivo" name="motivo" value="" placeholder="Ingrese motivo de la reunion ..." required /> 
        <br> 
        <label for="observaciones">Observaciones (*)</label> 
        <input type="text" id="observaciones" name="observaciones" value="" placeholder="Ingrese las observaciones ..." required /> 
        <br> 
        <input type="submit" id="crear" name="crear" value="Crear Reunion" /> 
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> 
    </form>
</body>

</html>