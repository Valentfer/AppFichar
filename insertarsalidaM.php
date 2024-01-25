<?php
$conexion = mysqli_connect('localhost', 'root', '', 'web');
mysqli_set_charset($conexion, "utf8");
session_start();

$dni = $_POST["dni"];
$hora_salida = $_POST["hora_salida"];
$fecha = $_POST["fecha"];
 
$stmt = $conexion->prepare('SELECT * FROM accesos WHERE dni = ? AND fecha = ?');
$stmt->bind_param('ss',  $dni, $fecha);
$stmt->execute();
$result = $stmt->get_result();
$filas = $result->fetch_all(MYSQLI_ASSOC);
                        
if($filas!=null){
		$consulta = $conexion->prepare('UPDATE accesos SET hora_salida= ? WHERE dni= ? AND fecha = ? AND hora_salida is null');
		$consulta->bind_param('sss', $hora_salida, $dni, $fecha);
		if($consulta->execute()){
			echo json_encode($consulta);
		}
}

echo json_encode($filas);
?>