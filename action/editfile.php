<?php

	include "../config/config.php";

if(!empty($_POST)){

	$id=$_POST["id"];
	$file = mysqli_query($con, "select * from file where id=$id");
	while ($rows=mysqli_fetch_array($file)) {
		$code=$rows['code'];
	}

	$description = $_POST["description"];
	$is_public = isset($_POST["is_public"])?1:0;

	$filename=$_POST["filename"];		
	$telefono=$_POST["celular"];		
	$cumple=$_POST["cumple"];			
	$diralmacen=$_POST["diralmacen"];		
	$horarioentrada=$_POST["horarioentrada"];	
	$horariosalida=$_POST["horariosalida"];
	$dircasa=$_POST["dircasa"];	
	$idvendedor=$_POST["idvendedor"];			 
	$description=$_POST["description"];

	$sql = "update file set 
			filename=\"$filename\", 
			idvendedor=\"$idvendedor\", 
			telefono=\"$telefono\", 
			cumple=\"$cumple\", 
			diralmacen=\"$diralmacen\", 
			horarioentrada=\"$horarioentrada\", 
			horariosalida=\"$horariosalida\", 
			dircasa=\"$dircasa\", 
			description=\"$description\" 
			
			where id=$id";

//echo($sql);
//	exit;
	$update=mysqli_query($con, $sql);
	if ($update) {
		// echo "actualizado con exito";
		header("location: ../editfile.php?id=".$code."&success");
	} else {
		// echo "hubo un error al actualizar los datos";
		header("location: ../editfile.php?id=".$code."&error");
	}
	

}


?>