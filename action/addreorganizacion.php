<?php

	session_start();

	include "../config/config.php";

//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){


	$nombreproceso = $_POST["nombreproceso"];
	$campo1 = $_POST["campo1"];


    $sql = 'insert into pr_reorganizaciones (iduser,nombreproceso,campo1) value ('.$_SESSION["user_id"].',"'.$nombreproceso.'","'.$campo1.'")';

	//echo $sql;
//exit;
	//$sql .= "value (\"$_SESSION["user_id"]\",\"$nombreproceso\",\"$cumple\",\"$campo1\")";


	$query = mysqli_query($con, $sql);
	if ($query) {
		// echo "carpeta creada con exito";
		header("location: ../newreorganizacion.php?success");
	} else {
		// echo "hubo un error al crear la carpeta";
		header("location: ../newreorganizacion.php?error");
	}


}

?>