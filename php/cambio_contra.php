<?php

$errores = '';
$errores2 = '';
$guardado = '';

if(isset($_POST['guardar']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    //recibir los valores, sanitizarlos y guardarlos en una variable
    //contraseñas
	//$old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass2 = $_POST['new_pass2'];
    
    //comprobar si hay datos con espacios en blanco 
    /*if(empty($old_pass)){
        $errores .= '<li>Favor de ingresar su contraseña actual.</li>';
    }else{
        //comprobar si que sea la contraseña correcta
        //acceder a la bd
        require ('conexion.php');

        //sentencias preparadas
        $query = "SELECT * FROM usuarios WHERE Contra = ? Collate Latin1_General_CS_AS";
        $param = array($old_pass);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

        //comprobando si existe el usuario
        if(sqlsrv_num_rows($stmt) == 0){
            $errores .= '<li>La contraseña actual es incorrecta.</li>';
        }
        
        sqlsrv_free_stmt($stmt);
    }*/
    
    //comprobar que las contraseñas sean iguales
    if($new_pass !== $new_pass2){
        $errores .= '<li>Las contraseñas no son iguales.</li>';
    //comprobar que la contraseña tenga un mínimo de 10 caracteres
    }elseif(strlen($new_pass) < 6 || strlen($new_pass2) < 6){
        $errores .= '<li>La contraseña debe tener un mínimo de 6 caracteres.</li>';
    }elseif(empty($new_pass) || empty($new_pass2)){
		$errores .= '<li>La contraseña no puede estar vacía.</li>';
	}
    
    //insertar nuevo usuario
    if(!$errores){
		require ('conexion.php');
        $update = "UPDATE Usuarios SET Contra = ? WHERE Usuario = ?;";
        $param2 = array($new_pass, $usuario);
        $stmt2 = sqlsrv_query($conn, $update, $param2, array("Scrollable"=>"static"));
        
		if($stmt2 === false){
			$guardado = false;
			$errores2 = '<li>Ocurrió un problema al intentar cambiar la contraseña, favor de comunicarse con soporte.</li>';
		}else{
        	$guardado = true;
			sqlsrv_free_stmt($stmt2);
		}
                
        sqlsrv_close($conn);
    }
}

?>