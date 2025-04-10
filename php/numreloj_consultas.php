<?php
$errores = '';
$busqueda = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $numreloj = filter_var(stripslashes($_POST['numreloj']), FILTER_SANITIZE_STRING);
    $numreloj = trim($numreloj);
    if(isset($_POST['tipo_empleado'])){
        $tipo_empleado = $_POST['tipo_empleado'];
    }else{
        $tipo_empleado = '';
    }

    if(empty($numreloj)){
        $errores .= '<li>Favor de ingresar un número de reloj válido.</li>';
    }elseif(!is_numeric($numreloj) && $tipo_empleado == 'mahle'){
        $errores .= '<li>Favor de ingresar sólo números.</li>';
    }elseif(strlen($numreloj) != 8 && $tipo_empleado == 'mahle'){
        $errores .= '<li>El número de reloj debe contener 8 dígitos.</li>';
    }

    if(empty($tipo_empleado)){
        $errores .= '<li>Favor de seleccionar el tipo de empleado.</li>';
    }

    if(empty($errores) && $tipo_empleado == 'mahle'){
        //comprobar si el número de reloj existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM AltasEmp WHERE NumeroReloj = ?";
        $param = array($numreloj);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //comprobando si existe el número de reloj existe
        if(sqlsrv_num_rows($stmt) > 0){
            header('Location: consulta_empleado_vista.php');
            //session_start();
            $_SESSION['numreloj'] = $numreloj;
        }else{
            $busqueda = 'error1';
			//session_start();
            $_SESSION['numreloj_alta'] = $numreloj;
        }
		
		sqlsrv_free_stmt($stmt);
    	sqlsrv_close($conn);
    }

    if(empty($errores) && $tipo_empleado == 'externo'){
        //comprobar si el número de reloj existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM AltasExt WHERE NumeroReloj = ?";
        $param = array($numreloj);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //comprobando si existe el número de reloj existe
        if(sqlsrv_num_rows($stmt) > 0){
            header('Location: consulta_externo_vista.php');
            session_start();
            $_SESSION['numreloj'] = $numreloj;
        }else{
            $busqueda = 'error2';
        }
		
		sqlsrv_free_stmt($stmt);
    	sqlsrv_close($conn);
    }
}
?>