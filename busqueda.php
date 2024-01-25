<?php
	
$conexion = mysqli_connect('localhost', 'root', '', 'web');
$dni = $_GET['dni'];

	$consulta = "SELECT * FROM empleados  WHERE dni = $dni";
	$resultado = $conexion->query($consulta);

	while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
		$producto[] = array_map('utf8_encode', $fila);
	}
	
	echo json_encode($producto);
	$resultado->close();
?>