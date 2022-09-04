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
	  <div class="row justify-content-center">
        <nav class="navbar navbar-light bg-light">
           <a class="navbar-brand " href="pedidos.php">Pedidos</a>
           <a class="navbar-brand" href="mayoristas.php">Mayoristas</a>
           <a class="navbar-brand" href="index.php">Empleados</a>
        </nav>
	  </div>
    </div>
<div class="container">
        <div class="table-wrapper empleados">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8" id="titulo"><h2>Listado de empleados <b>Aveiro</b></h2></div>
                    <div class="col-sm-4">
                        </br><a href="alta.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Nuevo empleado</a>
					</div>
                </div>
            </div>

            <table class="table table-bordered ">
                <thead>
                    <tr class="letras">
                        <td>ID Empleado</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>DNI</td>
						<td>telefono</td>
						<td>Inicio de actividades</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
				<?php 
					if (mysqli_affected_rows($con) != 0) {
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					?>
					
						<tr class="letras">
							<td ><?php echo $row["id"]?></td>
							<td ><?php echo $row["nombre"]?></td>
							<td ><?php echo $row["apellido"]?></td>
							<td ><?php echo $row["dni"]?></td>
							<td><?php echo $row["tel_contacto"]?></td>
							<td ><?php echo $row["fecha_alta"]?></td>
							<td align=center><a href='baja.php?id=<?php echo $row["id"]?>'>BAJA</td>
							<td align=center><a href='./modif.php?id=<?php echo $row["id"]?>'>MODIFICACION</td>
						</tr>
					
						<?php   
						}
					}else{
					?>
					<tr>
						<td colspan=100% align=center>sin datos</td>
					</tr>
					<?php
					}

				 ?>
                 
                <tbody>    
                          
                </tbody>
            </table>
        </div>
    </div>  



</body>
</html>