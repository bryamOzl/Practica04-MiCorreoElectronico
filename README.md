# Practica04–MiCorreoElectronico📄

Con base al archivo PHP (Apuntes y ejercicios), se pide realizar los siguientes ajustes:

a) Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user”

b) Los usuarios con rol de “admin” pueden: modificar, eliminar y cambiar la contraseña de cualquier usuario de la base de datos.

c) Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.

Luego, con base a estos ajustes realizados, se pide desarrollar una aplicación web usando PHP y Base de Datos que permita gestionar reuniones entre usuarios de la aplicación. De las reuniones se desea conocer la fecha y hora, lugar, coordenadas (latitud y longitud) remitente (quien invita), invitados (quienes asisten), motivo de la reunión y observaciones.
Para lo cual, se pide como mínimo los siguientes requerimientos:

Usuario con rol de user:

d) Visualizar en su página principal (index.php) el listado de todas las reuniones agendadas, ordenados por las más recientes.

e) Crear reuniones e invitar a otros usuarios de la aplicación web.

f) Buscar en las reuniones agendadas. La búsqueda se realizará por el motivo de la reunión y se deberá aplicar Ajax para la búsqueda.

g) Modificar los datos del usuario.

h) Cambiar la contraseña del usuario.

Usuario con rol de admin:

i) No puede recibir ni invitar a reuniones.

j) Visualizar en su página principal (index.php) el listado de todas las reuniones existentes, ordenados por los más recientes.

k) Eliminar las reuniones de los usuarios con rol “user”.

l) Eliminar, modificar y cambiar contraseña de los usuarios con rol “user”.

Por último, se debe aplicar parámetros de seguridad a través del uso de sesiones. Para lo cual, se debe tener en cuenta:

m) Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública.

n) Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin → vista → admin y admin → controladores → admin

o) Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user y admin → controladores → user

# Desarrollo 🚀

## a.Estructura de nuestra Practica.⌨️
![1](https://user-images.githubusercontent.com/34387442/70515955-2ef74e80-1b04-11ea-87a3-3abf9ddf3144.png)

## b.El diagrama E-R de la solución propuesta.⌨️
![2](https://user-images.githubusercontent.com/34387442/70516153-7e3d7f00-1b04-11ea-9343-03bff9499085.png)

## c.Nombre de la base de datos.⌨️
                                                               hypermedial

## d.Sentencias SQL de la estructura de la base de datos.⌨️
```
Estructura de tabla para la tabla `usuario`
CREATE TABLE `usuario` (
`usu_codigo` int(11) NOT NULL,
`usu_cedula` varchar(10) NOT NULL,
`usu_nombres` varchar(50) NOT NULL,
`usu_apellidos` varchar(50) NOT NULL,
`usu_direccion` varchar(75) NOT NULL,
`usu_telefono` varchar(20) NOT NULL,
`usu_correo` varchar(50) NOT NULL,
`usu_password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
`usu_fecha_nacimiento` date NOT NULL,
`usu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`usu_fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
`usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
`usu_rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `usuario`
ADD PRIMARY KEY (`usu_codigo`),
ADD UNIQUE KEY `usu_cedula` (`usu_cedula`);
ALTER TABLE `usuario`
MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

Estructura de tabla para la tabla `reunion`
CREATE TABLE `reunion` (
`reu_codigo` int(11) NOT NULL,
`reu_fecha` date NOT NULL,
`reu_hora` varchar(10) NOT NULL,
`reu_lugar` varchar(100) NOT NULL,
`reu_cordenadas` varchar(250) NOT NULL,
`reu_remitente` varchar(50) NOT NULL,
`reu_motivo` varchar(200) NOT NULL,
`reu_observaciones` varchar(1000) NOT NULL,
`reu_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`reu_fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
`reu_fecha_modificacion` timestamp NULL DEFAULT NULL,
`usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `reunion`
ADD PRIMARY KEY (`reu_codigo`),
ADD KEY `usu_codigo_FK` (`usu_codigo`);
ALTER TABLE `reunion`
MODIFY `reu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `reunion`
ADD CONSTRAINT `usu_codigo_FK` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;
COMMIT;


Estructura de tabla para la tabla `invitacion`
CREATE TABLE `invitacion` (
`inv_codigo` int(11) NOT NULL,
`inv_fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
`inv_eliminado` varchar(1) NOT NULL DEFAULT 'N',
`inv_fecha_modificacion` timestamp NULL DEFAULT NULL,
`usu_codigo` int(11) NOT NULL,
`reu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `invitacion`
ADD PRIMARY KEY (`inv_codigo`),
ADD KEY `reu_codigo_FK` (`reu_codigo`),
ADD KEY `usu_codigo_inv_FK` (`usu_codigo`);
ALTER TABLE `invitacion`
MODIFY `inv_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `invitacion`
ADD CONSTRAINT `reu_codigo_FK` FOREIGN KEY (`reu_codigo`) REFERENCES `reunion` (`reu_codigo`) ON UPDATE CASCADE,
ADD CONSTRAINT `usu_codigo_inv_FK` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
```


## e. La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cuál, se puede generar fotografías instantáneas (pantallazos).⌨️

1. Ventana para registrar usuarios.

![3](https://user-images.githubusercontent.com/34387442/70516595-4125bc80-1b05-11ea-815c-a71327198975.png)

2. Ventana del login.

![4](https://user-images.githubusercontent.com/34387442/70516637-56025000-1b05-11ea-82e8-12001b0d2da3.png)

3. Inicio de sesión con un Usuario de rol admín.

![5](https://user-images.githubusercontent.com/34387442/70516678-6a464d00-1b05-11ea-880f-15ab9d4fdd2c.png)

3.1. Eliminar Usuario.

![6](https://user-images.githubusercontent.com/34387442/70516731-7c27f000-1b05-11ea-97a7-1f3120a71762.png)

3.2. Modificar Usuario.

![7](https://user-images.githubusercontent.com/34387442/70516774-8c3fcf80-1b05-11ea-82a6-5ff9ff1563e0.png)

3.3. Cambiar Contraseña.

![8](https://user-images.githubusercontent.com/34387442/70516802-99f55500-1b05-11ea-973e-a89def796e20.png)

3.4. Eliminar Reunión.

![9](https://user-images.githubusercontent.com/34387442/70516852-af6a7f00-1b05-11ea-978b-0d8596e20888.png)

4. Inicio de sesión con un Usuario de rol user.

![10](https://user-images.githubusercontent.com/34387442/70516918-c4471280-1b05-11ea-9922-cc9fcdbd958d.png)

4.1. Modificar Usuario.

![11](https://user-images.githubusercontent.com/34387442/70516943-d0cb6b00-1b05-11ea-8004-bad967a8ed85.png)

4.2. Cambiar Contraseña.

![12](https://user-images.githubusercontent.com/34387442/70516986-e345a480-1b05-11ea-9499-41b68e50a907.png)

4.3. Crear Reunión.

![13](https://user-images.githubusercontent.com/34387442/70517017-f0fb2a00-1b05-11ea-861e-645333185ab6.png)

## f. El informe debe incluir conclusiones apropiadas.⌨️
### Concluciones
```
• Con el manejo correcto de lo aprendido podemos implementar y entender de mejor manera todos los conceptos necesarios para el desarrollo de la práctica.
• En esta practica se pudo implementar todo lo aprendido durante el Inter ciclo ya que se utilizo cada complemento para diseñar una pagina web ya esta vez con base de datos incluida.
• Cada complemento ayuda a entender cómo funciona y están diseñadas las paginas web que uno visita al manejar internet.
```

