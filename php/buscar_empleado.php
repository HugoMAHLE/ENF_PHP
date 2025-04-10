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
        $stmt = $conexion->prepare("SELECT * FROM AltasEmp WHERE NumeroReloj = ?");
        $stmt->bind_param('s', $numreloj);
        $stmt->execute();
        //obtener un resultado TRUE con la consulta
        $resultado = $stmt->fetch();

        //comprobando si el valor es TRUE
        if ($resultado == true) {
            header('Location: info_empleado_vista.php');
            session_start();
            $_SESSION['numreloj'] = $numreloj;
        }else{
            $errores .= '<li>El número de reloj no existe en la base de datos. Intente con otro número de reloj.</li>';
        }

        $stmt->close();
        $conexion->close();
    }

    if(empty($errores) && $tipo_empleado == 'externo'){
        //comprobar si el número de reloj existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $stmt = $conexion->prepare("SELECT * FROM AltasExt WHERE NumeroReloj = ?");
        $stmt->bind_param('s', $numreloj);
        $stmt->execute();
        //obtener un resultado TRUE con la consulta
        $resultado = $stmt->fetch();

        //comprobando si el valor es TRUE
        if ($resultado == true) {
            header('Location: info_externo_vista.php');
            session_start();
            $_SESSION['numreloj'] = $numreloj;
        }else{
            $errores .= '<li>El número de reloj no existe en la base de datos. Intente con otro número de reloj.</li>';
        }

        $stmt->close();
        $conexion->close();
    }
}
?>