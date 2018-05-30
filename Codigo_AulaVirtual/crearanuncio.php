<?php
	require ('conexion.php');
	
	$cod_anuncio=$_POST['cod_anuncio'];
	$cod_curso = $_POST['cod_curso'];
	$tema=$_POST['tema'];
	$descripcion = $_POST['descripcion'];
	$fecha = $_POST['fecha'];
	
	
	$sql = "INSERT INTO auv_anuncio (cod_anuncio, cod_curso, tema, descripcion, fecha) VALUES('$cod_anuncio, $cod_curso, $tema, $descripcion, $fecha')";
	$resultado = $mysqli->query($sql);
	
	if($resultado){
		echo "Registro Guardado";
		} else {
		echo "Error al Registrar";
	}
?>