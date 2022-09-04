<?php  
require 'db_conn.php';
$query = "select * from mayoristas";
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
                    <div class="col-sm-8"><h2>Nuevo <b>Mayorista</b></h2></div>
                    <div class="col-sm-4">
                        </br><a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> volver</a>
                    </div>
                </div>
            </div>

			<div class="row">
				<form method="POST" action="altaMayorista.php">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>telefono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="100">
				</div>
				<div class="col-md-6">
				<label>Producto</label>					
					<select name="id_producto" id="id_producto" class='form-control'>
							<option value="">-- seleccione --</option>
							<?php 
							
								$query= "select * from productos";

								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0 ) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($id != $row['id']) {
											echo "<option value=". $row['id'] .">" . $row['nombre'] . "</option>";
										}else{
											echo "<option selected value=". $row['id'] .">" . $row['nombre'] . "</option>";
										}
									}								
								}
							
							?>
					</select>
					</div>
				<div class="col-md-6">
				<label>Transportista</label>					
					<select name="id_transportista" id="id_transportista" class='form-control'>
							<option value="">-- seleccione --</option>
							<?php 
							
								$query= "select * from transportistas";

								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0 ) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($id != $row['id']) {
											echo "<option value=". $row['id'] .">" . $row['nombre'] . " " . $row['apellido'] . "</option>";
										}else{
											echo "<option selected value=". $row['id'] .">" . $row['nombre'] . $row['apellido'] . "</option>";
										}
									}								
								}
							
							?>
					</select>
					</div>
				<div class="col-md-12 pull-right" id="boton">
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

if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['id_producto'])&& isset($_POST['id_transportista']))
{
	
	require 'db_conn.php';

	$fecha	= date("Y-m-d");

	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$id_producto = $_POST['id_producto'];
    $id_transportista = $_POST['id_transportista'];
    // $fecha_alta = $_POST['fecha_alta'];

    // probar si llegan los datos(prueba de escritorio)
    // echo 'nombre:' . $nombre;
    // echo 'apellido:' . $apellido;
    // echo 'dni:' . $dni;
    // echo 'tel_contacto:' . $tel_contacto;
    // echo 'fecha_alta:' . $fecha_alta;

    // exit();

	if (mysqli_query($con, "INSERT into mayoristas (nombre, telefono, id_producto, id_transportista) VALUES
							 ('$nombre','$telefono',$id_producto, '$id_transportista' )")) {

		echo "<html><head><script>alert('Nuevo Mayorista guardado');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=mayoristas.php'>";
	} else {
		echo "<html><head><script>alert('ERROR! El guardado no se completo');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	
}

?>
