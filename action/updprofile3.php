<?php
	session_start();

	if (!isset($_SESSION['user_id']) && $_SESSION['user_id']==null) {
		header("location: ../");
	}

	include "../config/config.php";


	$id = $_POST['idexterno'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];

	if(isset($_POST['token'])){
		$update=mysqli_query($con,"UPDATE user set fullname=\"$fullname\", email=\"$email\" where id=$id");
		if ($update) {

                        $success=("Usuairo Actualizado Correctamente");
            			header("location: ../edituser.php?success=$success");
	   	}else{
	   		// echo "error".mysqli_error($con);
	   	}

	   	// CHANGE PASSWORD
		if($_POST['password']!=""){

			$password = sha1(md5($_POST['password']));
			$new_password = sha1(md5($_POST['new_password']));
			$confirm_new_password = sha1(md5($_POST['confirm_new_password']));	

			if($_POST['new_password']==$_POST['confirm_new_password']){

				$sql = mysqli_query($con,"SELECT * from user where id=$id");
				while ($row = mysqli_fetch_array($sql)) {
			    	$p = $row['password'];
				}

				if ($p==$password){ //comprobamos que la contraseña sea igual a la anterior

					$update_passwd=mysqli_query($con,"UPDATE user set password=\"$password\" where id=$id");
					if ($update_passwd) {
						$success_pass=("contrasena actualizada");
            			header("location: ../edituser.php?success=$success_pass");
					}
				}else{
					$invalid=("la contrasena no coincide la contraseña con la anterior");
            		header("location: ../edituser.php?invalid=$invalid");
				}
			}else{
				$error=("las nuevas  contraseñas no coinciden");
            	header("location: ../edituser.php?error=$error");
			}
		}
	}else{
		header("location: ../");
	}

?>