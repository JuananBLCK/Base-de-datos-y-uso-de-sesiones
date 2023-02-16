********************CÓMO CONFIGURAR Y CREAR LA BASE DE DATOS, LA TABLA Y LOS REGISTROS**************


---> Para poder empezar a interactuar correctamente con el formulario se requiere al menos realizar
    los cuatro primeros pasos. Una vez realizados, los usuarios pueden empezar a insertarse desde la 
    página de registro del propio formulario, pero sin la base de datos y la tabla correctamente 
    creadas no funcionará.


1. En primer lugar debemos ubicar ambas carpetas ("Create_DB" y "phpLogin"), en la ruta adecuada 
para el servidor local utilizado,en este caso XAMPP, para windows sería en C:\xampp\htdocs\.

2. Para comprobar que se puede realizar la conexión con una configuración de XAMPP, 
como si fuese recién instalada (sin contraseña), debemos abrir el archivo "conexion.php",
ubicado en la carpeta "Create_DB".

3. Una vez comprobado que existe conexión, crearemos la base de datos "feedback2", para ello
simplemente debemos abrir el archivo "db_create.php", ubicado en la carpeta "Create_DB".

4. Para crear la tabla donde insertaremos los usuarios debemos abrir el archivo "table_create.php",
ubicado en la carpeta "Create_DB".

5. Para insertar los primeros valores a modo de ejemplo podemos abrir el archivo "insert.php",
ubicado en la carpeta "Create_DB".

 - Los valores insertados serán:

        id	usuario	 contraseña	        mail

        1	Juanan	 juanan (encriptada)	juanan@mail.com
	2	Sarah	 sara (encriptada)	sarah@mail.com
	3	Pedrito	 pedrito (encriptada)	pedrito@mail.com

6. Para mostrar los valores que existen dentro de la tabla podemos abrir el archivo "show.php",
ubicado en la carpeta "Create_DB".

7. Para modificar el nombre de 'Pedrito' por 'Pedro', podemos abrir el archivo "update.php",
ubicado en la carpeta "Create_DB".

8. Una vez tenemos creadas la base de datos, la tabla y hemos insertado usuarios en ella, 
podemos abrir el archivo "index.php", ubicado en la carpeta "phpLogin".
