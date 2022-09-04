<?php
require 'db_conn.php';

if(isset($_POST['accion']) == 'UPD'){
	
	if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['tel_contacto'])){
		
		// $fecha	= date("Y-m-d");
        
        $id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$dni = $_POST['dni'];
		$tel_contacto = $_POST['tel_contacto'];
        

		//  echo 'nombre: '. $nombre;
		//  echo 'apellido: '. $apellido;
		//  echo 'dni: '. $dni;
		//  echo 'tel_contacto: '. $tel_contacto;
		//  exit();
		
		
		if (mysqli_query($con, "UPDATE empleados
								SET nombre = '$nombre', 
								    apellido = '$apellido', 
									dni = '$dni', 
									tel_contacto = '$tel_contacto'
								WHERE id = '$id'
								")) {
									
			echo "<html><head><script>alert('empleado modificado');</script></head></html>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		} else {
			echo "<html><head><script>alert('ERROR! El cambio no se completo');</script></head></html>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}
		
	}
}
?>