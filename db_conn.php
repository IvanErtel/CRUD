<?php

$host     = "localhost";	// Host name � servidor al que voy a conectar, como estamos trabajando de forma local, usamos localhost
$username = "root";			// usuario de base de datos, en la creaci�n de la  BD, por default MySql define el usuario root si no le indicamos otro.
$password = "";				// Mysql password sin psw en nuestro ejemplo
$db_name  = "aveiro2";			// nombre de la base de datos a la cual vamos a conectar

// conectar al servidor y seleccionar bd.
$con      = mysqli_connect($host, $username, $password, $db_name);

if (mysqli_connect_errno($con)) {
    echo "Error al conectar a MySQL: " . mysqli_connect_error();
//}else{
//	echo "conectado ";
}

?>
