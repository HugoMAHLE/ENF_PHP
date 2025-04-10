<?php
	require('conexion.php');

	$responsables = array();
	$query = "SELECT Nombres, Apellidos FROM Usuarios WHERE TCuenta IN ('medico', 'enfermera') ORDER BY Nombres ASC;";
	$stmt = sqlsrv_query($conn, $query, array(), array("Scrollable"=>"static"));

	//almacenar los valores de la BD a nuevas variables
	while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
		$nombres = $fila['Nombres'];
		$apellidos = $fila['Apellidos'];
		
		$responsables[] = array("nombres" => $nombres,
							    "apellidos" => $apellidos);
	}

	//devolver la cadena en forma de JSON
    echo json_encode($responsables);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>