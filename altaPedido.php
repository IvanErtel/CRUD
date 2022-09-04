<?php  
require 'db_conn.php';
$query = "select * from pedidos";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="col-sm-8"><h2>Nuevo <b>Pedido</b></h2></div>
                    <div class="col-sm-4">
                        </br><a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> volver</a>
                    </div>
                </div>
            </div>

			<div class="row">
				<form method="POST" action="altaPedido.php">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="Nombre" id="Nombre" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>fecha:</label>
					<input type="text" name="fecha" id="fecha" class='form-control' maxlength="100">
				</div>
                <div class="col-md-6">
					<label>cantidad</label>
					<input type="text" name="cantidad" id="cantidad" class='form-control' maxlength="100">
				</div>
                <div class="col-md-6">
                <div class="col-md-6">
					<label>productos</label>					
					<select name="id_producto" id="productos" class='form-control'>
							<option value="">-- seleccione --</option>
							<?php 
							
								$query= "select * from productos";

								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0 ) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($productos != $row['id']) {
											echo "<option value=". $row['id'] .">" ."ID: " . $row['id']." ". $row['nombre'] . "</option>";
										}else{
											echo "<option selected value=". $row['id'] .">" . $row['nombre'] . "</option>";
										}
									}								
								}
							
							?>
					</select>

				</div>
                <div class="col-md-6">
                <div class="col-md-6">
					<label>Mayorista</label>					
					<select name="id_mayorista" id="id_mayorista" class='form-control'>
							<option value="">-- seleccione --</option>
							<?php 
							
								$query= "select * from mayoristas";

								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0 ) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($mayoristas != $row['id']) {
											echo "<option value=". $row['id'] .">" . $row['nombre'] ." id_producto: ".$row['id_producto'] . "</option>";
										}else{
											echo "<option selected value=". $row['id'] .">" . $row['nombre']. $row['id_producto'] . "</option>";
										}
									}								
								}
							
							?>
					</select>

				</div>
				
                <div class="col-md-6">
					<label>Encargado</label>					
					<select name="encargado_pedido" id="encargado_pedido" class='form-control'>
							<option value="">-- seleccione --</option>
							<?php 
							
								$query= "select * from empleados";

								$result = mysqli_query($con, $query);

								if (mysqli_affected_rows($con) != 0 ) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if ($empleados != $row['id']) {
											echo "<option value=". $row['id'] .">" . $row['nombre'] . "</option>";
										}else{
											echo "<option selected value=". $row['id'] .">" . $row['nombre'] . "</option>";
										}
									}								
								}
							
							?>
					</select>

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

if(isset($_POST['Nombre']) && isset($_POST['fecha']) && isset($_POST['cantidad'])&& isset($_POST['id_producto'])&& isset($_POST['id_mayorista'])&& isset($_POST['encargado_pedido'])){

	require 'db_conn.php';
	$fecha	= date("Y-m-d");

	$Nombre = $_POST['Nombre'];
	$fecha = $_POST['fecha'];
	$cantidad = $_POST['cantidad'];
    $id_productos = $_POST['id_producto'];
    $id_mayorista = $_POST['id_mayorista'];
    $encargado_pedido = $_POST['encargado_pedido'];


    // exit();

	if (mysqli_query($con, "INSERT into pedidos (id,Nombre, fecha, cantidad, id_producto, id_mayorista,encargado_pedido) VALUES
							 ('','$Nombre','$fecha','$cantidad', '$id_productos', '$id_mayorista','$encargado_pedido' )")) {

		echo "<html><head><script>alert('datos del pedido guardados');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	} else {
		echo "<html><head><script>alert('ERROR! El guardado no se completo');</script></head></html>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	
}

?>