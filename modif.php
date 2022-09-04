<?php  
require 'db_conn.php';

    $id=$_GET['id'];
	
	//busco datos del empleado
	$query  = "select * from empleados WHERE id=$id";

	// echo "query: " ."select * from empleado WHERE id=$id";
	
	// echo $query;
	$result = mysqli_query($con, $query);
	
	if (mysqli_affected_rows($con) == 1) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
			$id           =$row['id'];
            $nombre       = $row['nombre'];
	        $apellido     = $row['apellido'];
	        $dni          = $row['dni'];
            $tel_contacto = $row['tel_contacto'];
		}
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>empleado</b></h2></div>
                    <div class="col-sm-4">
                        
                    </div>
                </div>
            </div>

			<div class="row">
				<form method="POST" action="modif2.php">
				<input type=hidden name="accion" value="UPD">
				<input type=hidden name="id" value="<?php echo $id;?>">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" value="<?php echo $nombre;?>">
				</div>
				<div class="col-md-6">
					<label>Apellido:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" value="<?php echo $apellido;?>">
				</div>
                <div class="col-md-6">
					<label>dni:</label>
					<input type="text" name="dni" id="nombre" class='form-control' maxlength="100" value="<?php echo $dni;?>">
				</div>
                <div class="col-md-6">
					<label>Telefono:</label>
					<input type="text" name="tel_contacto" id="nombre" class='form-control' maxlength="100" value="<?php echo $tel_contacto;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> volver</a>
					<button type="submit" class="btn btn-success">Modificar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>