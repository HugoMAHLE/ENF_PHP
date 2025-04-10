<?php
	require('conexion.php');
	ini_set('max_execution_time', 0);

	$numreloj = $_POST['numreloj'];

	$query = "SELECT * FROM headcount WHERE NumeroReloj = ?";
	$param = array($numreloj);
	$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

	//verificar que existan registros de la consulta
	if(sqlsrv_num_rows($stmt) == 0){
		$registros[] = "nodata";
	}else{
		while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
			$nombre = $fila['Nombre'];
			$fecha_nac = $fila['FechaNacimiento'];
			$fecha_ing = $fila['FechaIngreso'];
			$planta = $fila['Planta'];
			
			if($planta == "1"){
				$planta = "PTC";
			}elseif($planta == "2"){
				$planta = "COMPRESORES";
			}elseif($planta == "3"){
				$planta = "HVAC";
			}elseif($planta == "4"){
				$planta = "R&C";
			}else{
				$planta = "COMPARTIDO";
			}
			
			$area = $fila['Area'];
			$turno = $fila['Turno'];
			$sexo = $fila['Sexo'];
			
			if($sexo == "Male"){
				$sexo = "Masculino";
			}else{
				$sexo = "Femenino";
			}

			$registros[] = array("nombre" => $nombre,
								 "fecha_nac" => $fecha_nac,
								 "fecha_ing" => $fecha_ing,
								 "planta" => $planta,
								 "area" => $area,
								 "turno" => $turno,
								 "sexo" => $sexo);
		}
	}
		
	//devolver la cadena en forma de JSON
	echo json_encode($registros);

	sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>