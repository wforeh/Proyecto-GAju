<?php

	session_start();

	include "../config/config.php";

//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){

        $fullname=$_POST["fullname"];
		$password=sha1(md5($_POST["password"]));
		$email=$_POST["email"];
		$perfil=$_POST["perfil"];
		$created_at = "NOW()";
		$is_admin=0;
		$default_profile="default.png";
		$sqls = "select * from user where (email= \"$email\")";
		$users = mysqli_query($con,$sqls);
		$count = mysqli_num_rows($users);
		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}


        if ($count>0)
        {
                $errors []= "El correo electrónico ya existe en nuestra base de datos";
                header("location: ../newuser.php?error");
        }else
        
        {

			$sql = "insert into user (perfil,fullname,email,is_admin,password,image,created_at) ";
			$sql .= "value (\"$perfil\",\"$fullname\",\"$email\",\"$is_admin\",\"$password\",\"$default_profile\",$created_at)";

			$query_new_insert = mysqli_query($con,$sql);
				if ($query_new_insert){
					header("location: ../newuser.php?success");
				} else{
                    $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);

                    header("location: ../newuser.php?error");
				}
        }	

        

	


   //$sql = "insert into file (code,filename,cumple,telefono,idvendedor,diralmacen,horarioentrada,horariosalida,dircasa,description,is_folder,is_public,user_id,created_at) ";
	//$sql .= "value (\"$code\",\"$filename\",\"$cumple\",\"$telefono\",\"$idvendedor\",\"$diralmacen\",\"$horarioentrada\",\"$horariosalida\",\"$dircasa\",\"$description\",1,$is_public,$user_id,NOW())";


	//$query = mysqli_query($con, $sql);
	//if ($query) {
	//	// echo "carpeta creada con exito";
	//	header("location: ../newfolder.php?success");
	//} else {
	//	// echo "hubo un error al crear la carpeta";
	//	header("location: ../newfolder.php?error");
	//}


}

?>