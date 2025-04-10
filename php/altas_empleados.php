<?php
if(isset($_SESSION['numreloj_alta'])){
        $numreloj = $_SESSION['numreloj_alta'];
}

$errores = '';
$errores2 = '';
$registrado = '';

if(isset($_POST['registrar'])){
    //recibir los valores, sanitizarlos y guardarlos en una variable
    
    //pestaña1
    /*$nombres = filter_var(stripslashes($_POST['nombres']), FILTER_SANITIZE_STRING);
    $nombres = trim($nombres);*/
	$numreloj = $_POST['numreloj'];
	$nombre = $_POST['nombres'];
	$area = $_POST['area'];
    $planta = $_POST['planta'];
    $turno = $_POST['turno'];
    $empresa = $_POST['empresa'];
    $fecha_ing = $_POST['fecha'];
    
	//pestaña2
	$sexo = $_POST['sexo'];
    $fecha_nac = $_POST['fecha_nac'];
	
    //enfermedades
    if(isset($_POST['enfermedades'])){
        $enfermedades = filter_var(stripslashes($_POST['enfermedades']), FILTER_SANITIZE_STRING);
        if(!empty(trim($enfermedades))){
            $enfermedades = trim($enfermedades);
        }
    }
    //alergias
    if(isset($_POST['alergias'])){
        $alergias = filter_var(stripslashes($_POST['alergias']), FILTER_SANITIZE_STRING);
        if(!empty(trim($alergias))){
            $alergias = trim($alergias);
        }
    }
    //hipertension
    if(isset($_POST['hipertension'])){
        $hipertension = $_POST['hipertension'];
    }else{
		$hipertension = '';
	}
    //diabetes
    if(isset($_POST['diabetes'])){
        $diabetes = $_POST['diabetes'];
    }else{
		$diabetes = '';
	}    
    
    /*//comprobar si hay datos con espacios en blanco para varios valores
    if(empty($nombre)){
        $errores .= '<li>Favor de ingresar los nombres del empleado.</li>';
    }
    
    if(empty($fecha_nac)){
        $errores .= '<li>Favor de ingresar la fecha de nacimiento.</li>';
    }
    //opcional
    if(empty($sexo)){
        $errores .= '<li>Favor de seleccionar el sexo del empleado.</li>';
    }*/
    
    //comprobar valores en blanco de enfermedades y alergias si es que fueron insertados
    if($enfermedades && empty(trim($enfermedades))){
        $enfermedades = trim($enfermedades);
        $errores2 .= '<li>Favor de ingresar alguna enfermedad válida.</li>';
    }
    if($alergias && empty(trim($alergias))){
        $alergias = trim($alergias);
        $errores2 .= '<li>Favor de ingresar alguna alergia válida.</li>';
    }
    
    //comprobar si hay datos con espacios en blanco 
    if(empty($numreloj)){
        $errores .= '<li>Favor de ingresar un número de reloj válido.</li>';
    //comprobar que se ingresen solo números
    }elseif(!is_numeric($numreloj)){
        $errores .= '<li>Favor de ingresar sólo números.</li>';
    }elseif(strlen($numreloj) !== 8){
        $errores .= '<li>El número de reloj debe contener 8 dígitos.</li>';
    }else{
        //comprobar si el número de reloj ya existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM AltasEmp WHERE NumeroReloj = ?";
        $param = array($numreloj);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));
		
        //comprobando si existe el número de reloj existe
        if(sqlsrv_has_rows($stmt) === true){
            $errores .= '<li>El empleado ya fue dado de alta, favor de ingresar otro número de reloj.</li>';
        }
        
        sqlsrv_free_stmt($stmt);
    }
    
    //comprobar si el área tiene espacios en blanco si es que fue insertado
    /*if($area && empty(trim($area))){
        $area = trim($area);
        $errores2 .= '<li>Favor de ingresar una área válida.</li>';
    }
    
    //validación opcional de selects
    if(empty($planta)){
        $errores2 .= '<li>Favor de seleccionar la planta.</li>';
    }
    if(empty($turno)){
        $errores2 .= '<li>Favor de seleccionar el turno.</li>';
    }
    
    if(empty($fecha)){
        $errores2 .= '<li>Favor de ingresar la fecha.</li>';
    }*/
    
    //actualizar usuario
    if(!$errores && !$errores2){
		$insert = "INSERT INTO altasemp (NumeroReloj, Nombre, FechaNacimiento, FechaIngreso, Planta, Area, Turno, Sexo, Alergias, Hipertension, Diabetes, Enfermedades, Empresa, FechaAlta) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";
		//SELECT DATEDIFF(hour, '1994-06-28' ,GETDATE())/8766
        $param2 = array($numreloj, $nombre, $fecha_nac, $fecha_ing, $planta, $area, $turno, $sexo, $alergias, $hipertension, $diabetes, $enfermedades, $empresa);
        $stmt2 = sqlsrv_query($conn, $insert, $param2, array("Scrollable"=>"static"));
        
        $registrado = true;
        
        sqlsrv_free_stmt($stmt2);
        sqlsrv_close($conn);
    }
}

?>