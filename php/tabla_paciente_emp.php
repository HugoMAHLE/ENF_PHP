<?php
	require('conexion.php');

	if(isset($_POST['numreloj'])){
		$numreloj = $_POST['numreloj'];
	}

	$query = "SELECT Fecha, Diagnostico, Tratamiento, Enfermedades, Comentarios FROM ConsultasEmp WHERE NumeroReloj = ? ORDER BY Fecha DESC;";
	$param = array($numreloj);
	$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

	//almacenar los valores de la BD a nuevas variables
	while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
		$fecha = $fila['Fecha'];
		$diagnostico = $fila['Diagnostico'];
		$tratamiento = $fila['Tratamiento'];
		$enfermedades = $fila['Enfermedades'];
		$comentarios = $fila['Comentarios'];
		
		$registros[] = array("fecha" => $fecha,
							  "diag" => $diagnostico,
							  "pad" => $tratamiento,
							  "enf" => $enfermedades,
							  "com" => $comentarios);
	}

	//devolver la cadena en forma de JSON
    echo json_encode($registros);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>