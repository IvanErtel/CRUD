<?php  
require 'db_conn.php';

    $id=$_GET['id'];
	
	//busco datos del mayorista
	$query  = "select * from mayoristas WHERE id=$id";

	$result = mysqli_query($con, $query);
	
	if (mysqli_affected_rows($con) == 1) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			
			$id           =$row['id'];
            $nombre       = $row['nombre'];
	        $telefono     = $row['telefono'];
	        $id_producto  = $row['id_producto'];
            $id_transportista = $row['id_transportista'];
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
                    <div class="col-sm-8"><h2>Editar <b>Mayorista</b></h2></div>
                    <div class="col-sm-4">
                        
                    </div>
                </div>
            </div>

			<div class="row">
				<form method="POST" action="modifMayorista.php">
				<input type=hidden name="accion" value="UPD">
				<input type=hidden name="id" value="<?php echo $id;?>">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" value="<?php echo $nombre;?>">
				</div>
				<div class="col-md-6">
					<label>telefono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="100" value="<?php echo $telefono;?>">
				</div>
                <div class="col-md-6">
					<label>id_producto:</label>
					<input type="text" name="id_producto" id="id_producto" class='form-control' maxlength="100" value="<?php echo $id_producto;?>">
				</div>
                <div class="col-md-6">
					<label>id_transportista:</label>
					<input type="text" name="id_transportista" id="id_transportista" class='form-control' maxlength="100" value="<?php echo $id_transportista;?>">
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