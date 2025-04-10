<?php

$errores = '';
$registrado = '';

if(isset($_POST['registrar']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    //recibir los valores, sanitizarlos y guardarlos en una variable
    //nombre de usuario
    $nombre_usuario = filter_var(stripslashes($_POST['user_name']), FILTER_SANITIZE_STRING);
    $nombre_usuario = trim($nombre_usuario);
    //contraseñas
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    //nombres y apellidos
    $nombres = filter_var(stripslashes($_POST['nombres']), FILTER_SANITIZE_STRING);
    $nombres = trim($nombres);
    $apellidos = filter_var(stripslashes($_POST['apellidos']), FILTER_SANITIZE_STRING);
    $apellidos = trim($apellidos);
    //tipo de cuenta
    $tipo_cuenta = $_POST['tipo_cuenta'];
    
    //comprobar si hay datos con espacios en blanco 
    if(empty($nombre_usuario)){
        $errores .= '<li>Favor de ingresar un nombre de usuario válido.</li>';
    }else{
        //comprobar si el nombre de usuario ya existe
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $param = array($nombre_usuario);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //comprobando si existe el usuario
        if(sqlsrv_num_rows($stmt) > 0){
            $errores .= '<li>El nombre de usuario ya existe, favor de ingresar un nombre de usuario diferente.</li>';
        }
        
        sqlsrv_free_stmt($stmt);
    }
    
    //comprobar que las contraseñas sean iguales
    if($pass !== $pass2){
        $errores .= '<li>Las contraseñas no son iguales.</li>';
    //comprobar que la contraseña tenga un mínimo de 10 caracteres
    }elseif(strlen($pass) < 6 || strlen($pass2) < 6){
        $errores .= '<li>La contraseña debe tener un mínimo de 6 caracteres.</li>';
    }
    
    //comprobar si hay datos con espacios en blanco para todos los valores
    if(empty($nombres)){
        $errores .= '<li>Favor de ingresar los nombres del usuario.</li>';
    }
    if(empty($apellidos)){
        $errores .= '<li>Favor de ingresar los apellidos del usuario.</li>';
    }
    if(empty($tipo_cuenta)){
        $errores .= '<li>Favor de seleccionar el tipo de cuenta.</li>';
    }
    
    //insertar nuevo usuario
    if(!$errores){
        $insert = "INSERT INTO Usuarios (Usuario, Contra, Nombres, Apellidos, TCuenta) 
		VALUES (?, ?, ?, ?, ?)";
        $param2 = array($nombre_usuario, $pass, $nombres, $apellidos, $tipo_cuenta);
        $stmt2 = sqlsrv_query($conn, $insert, $param2, array("Scrollable"=>"static"));
        
        $registrado = true;
        
        sqlsrv_free_stmt($stmt2);
        sqlsrv_close($conn);
    }
}

?>