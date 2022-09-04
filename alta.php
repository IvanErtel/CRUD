<?php  
require 'db_conn.php';
$query = "select * from empleados";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Aveiro Base de Datos</title>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Nuevo <b>empleado</b></h2></div>
                    <div class="col-sm-4">
                        </br><a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> volver</a>
                    </div>
                </div>
            </div>

			<div class="row">
				<form method="POST" action="alta.php">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Apellido:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100">
				</div>
                <div class="col-md-6">
					<label>dni:</label>
					<input type="text" name="dni" id="apellido" class='form-control' maxlength="100">
				</div>
                <div class="col-md-6">
					<label>telefono:</label>
					<input type="text" name="tel_contacto" id="apellido" class='form-control' maxlength="100">
				</div>
                <div class="col-md-6">
					<label>Inicio Actividades:</label>
					<input type="text" name="fecha_alta" id="apellido" class='form-control' maxlength="100" placeholder="ejemple: AAAA-MM-DD">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>

<?php

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni'])&& isset($_POST['tel_contacto'])
&& isset($_POST['fecha_alta'])){
	

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
    $tel_contacto = $_POST['tel_contacto'];
    $fecha_alta = $_POST['fecha_alta'];

    // probar si llegan los datos(prueba de escritorio)
    // echo 'nombre:' . $nombre;
    // echo 'apellido:' . $apellido;
    // echo 'dni:' . $dni;
    // echo 'tel_contacto:' . $tel_contacto;
    // echo 'fecha_alta:' . $fecha_alta;

    // exit();

	if (mysqli_query($con, "INSERT into empleados (nombre, apellido, dni, tel_contacto, fecha_alta) VALUES
							 ('$nombre','$apellido',$dni, '$tel_contacto', '$fecha_alta' )")) {

		echo "<html><head><script>alert('datos del empleado guardados');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	} else {
		echo "<html><head><script>alert('ERROR! El guardado no se completo');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	
}

?>