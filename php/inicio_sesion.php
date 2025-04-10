<?php
    session_start();

    //comprobación de sesion iniciada
    if(isset($_SESSION['usuario'])){
        header('Location: centro_act.php');
    }

    $errores = ''; 
    
    //comprobación de datos enviados
    if(isset($_POST['entrar'])){
        //sanitizar variables recibidas
        $usuario = filter_var(stripslashes($_POST['usuario']), FILTER_SANITIZE_STRING);
        $contra = $_POST['pass'];
        
        //validar campo vacío
        //if(strlen(trim($usuario)) == 0)
        if(empty(trim($usuario))){
            $usuario = trim($usuario);
            $errores .= '<li>Favor de introducir un usuario válido.</li>';
        }else{
            //conexion a la BD
            require ('conexion.php');
			
			if($conn === false){
				$errores .= '<li>Error en la conexión de red, favor de comunicarse con soporte.</li>';
			}else{
				//sentencias
				//se utiliza binary para comparar exactamente el valor almacenado en la bd
				$query = "SELECT * FROM usuarios WHERE usuario = ? Collate Latin1_General_CS_AS 
				AND contra = ? Collate Latin1_General_CS_AS";
				$param = array($usuario, $contra);
				$stmt = sqlsrv_query($conn, $query, $param, array("Scrollable"=>"static"));

				//comprobando si existe la fila
				if(sqlsrv_num_rows($stmt) == 0){
					$errores .= '<li>El usuario y/o la contraseña son incorrectas.</li>';
				}else{
					$_SESSION['usuario'] = $usuario;
					//$usuario = $_SESSION['usuario'];

					header('Location: ../index.php');
				}

				sqlsrv_free_stmt($stmt);
				sqlsrv_close($conn);
			}
        }        
    }
?>