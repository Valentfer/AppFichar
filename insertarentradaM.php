<?php

$conexion = mysqli_connect('localhost', 'root', '', 'web');
mysqli_set_charset($conexion, "utf8");
session_start();

$dni = $_POST["dni"];
$fecha = $_POST["fecha"];
$hora_entrada = $_POST["hora_entrada"];

$stmt = $conexion->prepare('SELECT * FROM accesos WHERE dni = ? AND fecha = ?');
$stmt->bind_param('ss',  $dni, $fecha);
$stmt->execute();
$result = $stmt->get_result();
$filas = $result->fetch_all(MYSQLI_ASSOC);
                        
if(empty($filas)){
		$consulta = $conexion->prepare('INSERT INTO accesos (dni, fecha, hora_entrada) VALUES (?, ?, ?)');
		$consulta->bind_param('sss', $dni, $fecha, $hora_entrada);
		if($consulta->execute()){
			echo json_encode($consulta);
		}
}

