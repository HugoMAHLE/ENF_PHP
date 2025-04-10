<?php
if(isset($_SESSION['numreloj'])){
        $numreloj = $_SESSION['numreloj'];
        
        /*if(isset($_SESSION['responsable'])){
            $responsable = $_SESSION['responsable'];
        }*/
	
		if(isset($nombre_usr)){
			$responsable = $nombre_usr;
		}
        
        require ('conexion.php');
        $query = "SELECT * FROM AltasExt WHERE NumeroReloj = ?";
        $param = array($numreloj);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //almacenar los valores de la BD a nuevas variables
		if(sqlsrv_num_rows($stmt) > 0){
			while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
				$nombres = $fila['Nombre'];
				$apellidos = $fila['Apellido'];
				$edad = $fila['FechaNacimiento'];
				$enfermedades = $fila['Enfermedades'];
				$alergias = $fila['Alergias'];
				$hipertension = $fila['Hipertension'];
				$diabetes = $fila['Diabetes'];
				$empresa = $fila['Empresa'];
				$practicante = $fila['Practicante'];
			}
		}
	
		if($edad == ''){
			$edad == '';
		}else{
			$query3 = "SELECT DATEDIFF(hour, ? ,GETDATE())/8766 AS Edad";
			$param4 = array($edad);
			$stmt4 = sqlsrv_query($conn, $query3, $param4, array("Scrollable"=>"static"));
			
			while($fila2 = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC)){
				$edad = $fila2['Edad'] . " años";
			}
			
			sqlsrv_free_stmt($stmt4);
		}
	
        $nombre_comp = $nombres . ' ' . $apellidos;
    	
		//verificar si hay consultas previas para mostrar historial médico
		$tabla = '';
		$query2 = "SELECT NumeroReloj FROM ConsultasExt WHERE NumeroReloj = ?";
		$param2 = array($numreloj);
		$stmt2 = sqlsrv_query($conn, $query2, $param2, array("Scrollable"=>"static"));

		if(sqlsrv_num_rows($stmt2) > 0){
			$tabla = 'llena';
		}
	
        sqlsrv_free_stmt($stmt);
		sqlsrv_free_stmt($stmt2);
}else{
	header('Location: numreloj_consultas_vista.php');
}

$errores = '';
$registrado = '';

if(isset($_POST['guardar'])){
    //recibir los valores, sanitizarlos y guardarlos en una variable
    
    //pestaña2
    //descripcion
    $descripcion = $_POST['descripcion'];
    //motivo
    $motivo = filter_var(stripslashes($_POST['motivo']), FILTER_SANITIZE_STRING);
    $motivo = trim($motivo);
    //exploracion
    if(isset($_POST['exploracion'])){
        $exploracion = filter_var(stripslashes($_POST['exploracion']), FILTER_SANITIZE_STRING);
        if(!empty(trim($exploracion))){
            $exploracion = trim($exploracion);
        }
    }
    //diagnostico
    $diagnostico = filter_var(stripslashes($_POST['diagnostico']), FILTER_SANITIZE_STRING);
    $diagnostico = trim($diagnostico);
    //tratamiento
    $tratamiento = filter_var(stripslashes($_POST['tratamiento']), FILTER_SANITIZE_STRING);
    $tratamiento = trim($tratamiento);
    //comentarios
    if(isset($_POST['comentarios'])){
        $comentarios = filter_var(stripslashes($_POST['comentarios']), FILTER_SANITIZE_STRING);
        if(!empty(trim($comentarios))){
            $comentarios = trim($comentarios);
        };
    }
    
    //opcional
    if(empty($descripcion)){
        $errores .= '<li>Favor de seleccionar la descripción.</li>';
    }
    //comprobar si hay datos con espacios en blanco para varios valores
    if(empty($motivo)){
        $errores .= '<li>Favor de ingresar el motivo de la consulta.</li>';
    }
    if(empty($diagnostico)){
        $errores .= '<li>Favor de ingresar un diagnóstico.</li>';
    }
    if(empty($tratamiento)){
        $errores .= '<li>Favor de ingresar el tratamiento del paciente.</li>';
    }
    
    //comprobar valores en blanco de exploracion y comentarios si es que fueron insertados
    if($exploracion && empty(trim($exploracion))){
        $exploracion = trim($exploracion);
        $errores .= '<li>Favor de ingresar la exploración física del paciente.</li>';
    }
    if($comentarios && empty(trim($comentarios))){
        $comentarios = trim($comentarios);
        $errores .= '<li>Favor de ingresar comentarios válidos.</li>';
    }
    
    //insertar consulta del paciente (externo)
    if(!$errores){
        $insert = "INSERT INTO ConsultasExt (NumeroReloj, Motivo, Diagnostico, Tratamiento, ExploracionFisica, Comentarios, Descripcion, Responsable, Fecha, Empresa, Practicante, Enfermedades) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, (SELECT GETDATE()), ?, ?, ?)";
        $param3 = array($numreloj, $motivo, $diagnostico, $tratamiento, $exploracion, 
        $comentarios, $descripcion, $responsable, $empresa, $practicante, $enfermedades);
        $stmt3 = sqlsrv_query($conn, $insert, $param3, array("Scrollable"=>"static"));
        
        $registrado = true;
        
        sqlsrv_free_stmt($stmt3);
    	sqlsrv_close($conn);
        
        unset($_SESSION['numreloj']);
        //unset($_SESSION['responsable']);
    }
}

?>