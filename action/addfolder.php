<?php

	session_start();

	include "../config/config.php";

//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	
	$code= $code;
	$is_public = isset($_POST["is_public"])?1:0;
	$user_id=$_SESSION["user_id"];
	$description = $_POST["description"];

	$filename = $_POST["filename"];
	$cumple = $_POST["cumple"];
    $telefono =  $_POST["celular"];
	$diralmacen =  $_POST["diralmacen"];
	$horarioentrada = $_POST["horarioentrada"];
	$horariosalida = $_POST["horariosalida"];
	$dircasa = $_POST["dircasa"];
	$idvendedor = $_POST["idvendedor"];
	


    $sql = "insert into file (code,filename,cumple,telefono,idvendedor,diralmacen,horarioentrada,horariosalida,dircasa,description,is_folder,is_public,user_id,created_at) ";
	$sql .= "value (\"$code\",\"$filename\",\"$cumple\",\"$telefono\",\"$idvendedor\",\"$diralmacen\",\"$horarioentrada\",\"$horariosalida\",\"$dircasa\",\"$description\",1,$is_public,$user_id,NOW())";


	$query = mysqli_query($con, $sql);
	if ($query) {
		// echo "carpeta creada con exito";
		header("location: ../newfolder.php?success");
	} else {
		// echo "hubo un error al crear la carpeta";
		header("location: ../newfolder.php?error");
	}


}

?>