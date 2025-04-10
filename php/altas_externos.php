<?php
unset($_SESSION['numreloj_alta']);
$errores = '';
$errores2 = '';
$registrado = '';

if(isset($_POST['registrar'])){
    //recibir los valores, sanitizarlos y guardarlos en una variable
    
    //pestaña1
    //nombres
    $nombres = filter_var(stripslashes($_POST['nombres']), FILTER_SANITIZE_STRING);
    $nombres = trim($nombres);
    //apellidos
    $apellidos = filter_var(stripslashes($_POST['apellidos']), FILTER_SANITIZE_STRING);
    $apellidos = trim($apellidos);
    //fecha de nacimiento
    $fecha_nac = $_POST['fecha_nac'];
    //sexo
    $sexo = $_POST['sexo'];
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
        };
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
    
    //pestaña2
    //número de reloj
    $numreloj = filter_var(stripslashes($_POST['numreloj']), FILTER_SANITIZE_STRING);
    $numreloj = trim($numreloj);
    //empresa
    $empresa = filter_var(stripslashes($_POST['empresa']), FILTER_SANITIZE_STRING);
    $empresa = trim($empresa);
    //practicante
    if(isset($_POST['practicante'])){
        $practicante = $_POST['practicante'];
    }else{
		$practicante = '';
	}
    //turno
    if(isset($_POST['turno'])){
        $turno = $_POST['turno'];
    }
    //fecha
    $fecha = $_POST['fecha'];
    
    
    //comprobar si hay datos con espacios en blanco para varios valores
    if(empty($nombres)){
        $errores .= '<li>Favor de ingresar los nombres del empleado.</li>';
    }
    if(empty($apellidos)){
        $errores .= '<li>Favor de ingresar los apellidos del empleado.</li>';
    }
    
    if(empty($fecha_nac)){
        $errores .= '<li>Favor de ingresar la fecha de nacimiento.</li>';
    }
    //opcional
    if(empty($sexo)){
        $errores .= '<li>Favor de seleccionar el sexo del empleado.</li>';
    }
    
    //comprobar valores en blanco de enfermedades y alergias si es que fueron insertados
    if($enfermedades && empty(trim($enfermedades))){
        $enfermedades = trim($enfermedades);
        $errores .= '<li>Favor de ingresar alguna enfermedad válida.</li>';
    }
    if($alergias && empty(trim($alergias))){
        $alergias = trim($alergias);
        $errores .= '<li>Favor de ingresar alguna alergia válida.</li>';
    }
    
    //comprobar si hay datos con espacios en blanco 
    if(empty($numreloj)){
        $errores2 .= '<li>Favor de ingresar un número de reloj válido.</li>';
    }else{
        //comprobar si el número de reloj ya existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM AltasExt WHERE NumeroReloj = ?";
        $param = array($numreloj);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //comprobando si el número de reloj existe
        if(sqlsrv_num_rows($stmt) > 0){
            $errores2 .= '<li>El número de reloj ya ha sido registrado, favor de ingresar otro número de reloj.</li>';
        }
        
        sqlsrv_free_stmt($stmt);
    }
    
    //validar espacios en blanco de la empresa
    if(empty($empresa)){
        $errores2 .= '<li>Favor de ingresar una empresa o universidad válida.</li>';
    }
    
    //validar fecha opcional
    if(empty($fecha)){
        $errores2 .= '<li>Favor de ingresar la fecha.</li>';
    }
    
    //insertar nuevo usuario
    if(!$errores && !$errores2){
        $insert = "INSERT INTO AltasExt (NumeroReloj, Nombre, Apellido, Sexo, FechaIngreso, Empresa, Turno, Alergias, Hipertension, Diabetes, FechaNacimiento, Enfermedades, Practicante, FechaAlta) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";
        $param2 = array($numreloj, $nombres, $apellidos, $sexo, $fecha, $empresa, $turno, $alergias, $hipertension, $diabetes, $fecha_nac, $enfermedades, $practicante);
        $stmt2 = sqlsrv_query($conn, $insert, $param2, array("Scrollable"=>"static"));
        
        $registrado = true;
        
        sqlsrv_free_stmt($stmt2);
        sqlsrv_close($conn);
    }
}

?>