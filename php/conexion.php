<?php
	$serverName = "localhost"; 
    $connectionInfo = array( "Database"=>"Enfermeria", "UID"=>"sa", "PWD"=>"dbaaccess", "ReturnDatesAsStrings"=>true, "CharacterSet"=>"UTF-8");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if($conn === false) {
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }
?>