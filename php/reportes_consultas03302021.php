<?php
    require('conexion.php');
	ini_set('max_execution_time', 0);
    
    //guardar los datos enviados
    $empleado = $_POST['empleado'];
	$descripcion = $_POST['descripcion'];
	$fecha_i = $_POST['fecha_inicio'];
	$fecha_f = $_POST['fecha_final'];
	$hora_i = $_POST['hora_inicio'];
	$hora_f = $_POST['hora_final'];
	
	//fechas concatenadas
	$fecha1= $fecha_i . ' ' . $hora_i . '.000';
	$fecha2= $fecha_f . ' ' . $hora_f . '.997';

	if((isset($_POST['responsable'])) && (!empty($_POST['responsable']))){
		$responsable = $_POST['responsable'];
	}

	if((isset($_POST['planta'])) && (!empty($_POST['planta']))){
		$planta = $_POST['planta'];
	}
		
	//búsquedas de empleado interno
	if($empleado == 'interno'){
		//búsqueda normal
		if($descripcion && $fecha1 && $fecha2 && empty($_POST['responsable']) && empty($_POST['planta'])){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Planta FROM ConsultasEmp WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$planta2 = $fila['Planta'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "planta" => $planta2);
				}
			}
		
		//búsqueda con responsable
		}elseif($descripcion && $fecha1 && $fecha2 && $responsable && empty($_POST['planta'])){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Planta FROM ConsultasEmp WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) AND (Responsable = ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2, $responsable);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$planta2 = $fila['Planta'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "planta" => $planta2);
				}
			}
			
		//búsqueda con planta
		}elseif($descripcion && $fecha1 && $fecha2 && empty($_POST['responsable']) && $planta){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Planta FROM ConsultasEmp WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) AND (Planta = ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2, $planta);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$planta2 = $fila['Planta'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "planta" => $planta2);
				}
			}
			
		///búsqueda con responsable y planta
		}elseif($descripcion && $fecha1 && $fecha2 && $responsable && $planta){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Planta FROM ConsultasEmp WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) AND (Responsable = ?) AND (Planta = ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2, $responsable, $planta);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$planta2 = $fila['Planta'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "planta" => $planta2);
				}
			}
		}
		
	//búsquedas de empleado externo
	}elseif($empleado == 'externo'){
		//búsqueda normal
		if($descripcion && $fecha1 && $fecha2 && empty($_POST['responsable']) && empty($_POST['planta'])){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Practicante FROM ConsultasExt WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$practicante = $fila['Practicante'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "practicante" => $practicante);
				}
			}
		
		//búsqueda con responsable
		}elseif($descripcion && $fecha1 && $fecha2 && $responsable && empty($_POST['planta'])){
			$query = "SELECT Fecha, NumeroReloj, Motivo, Diagnostico, Tratamiento, Descripcion, Responsable, Empresa, Practicante FROM ConsultasExt WHERE (Descripcion = ?) AND (Fecha >= ?) AND (Fecha <= ?) AND (Responsable = ?) ORDER BY Fecha DESC;";
			$param = array($descripcion, $fecha1, $fecha2, $responsable);
			$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
			
			//verificar que existan registros de la consulta
			if(sqlsrv_num_rows($stmt) == 0){
				$registros[] = "nodata";
			}else{
				while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
					$fecha = $fila['Fecha'];
					$numreloj = $fila['NumeroReloj'];
					$motivo = $fila['Motivo'];
					$diagnostico = $fila['Diagnostico'];
					$tratamiento = $fila['Tratamiento'];
					$desc = $fila['Descripcion'];
					$resp = $fila['Responsable'];
					$empresa = $fila['Empresa'];
					$practicante = $fila['Practicante'];

					$registros[] = array("fecha" => $fecha,
										 "numreloj" => $numreloj,
										 "motivo" => $motivo,
										 "diagnostico" => $diagnostico,
										 "tratamiento" => $tratamiento,
										 "descripcion" => $desc,
										 "responsable" => $resp,
										 "empresa" => $empresa,
										 "practicante" => $practicante);
				}
			}
		}
	}

	//devolver la cadena en forma de JSON
	echo json_encode($registros);

	sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>