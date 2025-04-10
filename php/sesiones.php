<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location: inicio_sesion_vista.php");
    }else{
        $usuario = $_SESSION['usuario'];
        require ('conexion.php');
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $param = array($usuario);
        $stmt = sqlsrv_query($conn, $query, $param, array("Scrollable" => "static"));

        if(sqlsrv_num_rows($stmt) > 0){
			//almacenar los valores de la BD a nuevas variables
			while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
				$cuenta = $fila['TCuenta'];
				$n_usr = $fila['Nombres'];
				$a_usr = $fila['Apellidos'];
				$usr_id = $fila['UsuarioID'];
			}
		}

        //cocatenar el nombre completo del usuario
        $nombre_usr = $n_usr . ' ' . $a_usr;

        //redirección de tipo de cuenta
        if($cuenta == 'rh'){
            header('Location: centro_rh.php');
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>