
<?php

if(isset($_GET['id'])) {

	require 'db_conn.php';
	$id = $_GET['id'];
    echo 'hola'. $id;
   echo "DELETE FROM empleados WHERE id = $id";
exit();
    mysqli_query($con, "DELETE FROM empleados WHERE id = $id");
    echo "<html><head><script>alert('empleado Eliminado');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";

} else {
    echo "<html><head><script>alert('ERROR! El borrado no se completo');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

mysqli_close($con);

?>
