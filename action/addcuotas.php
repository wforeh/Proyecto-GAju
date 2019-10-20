<?php

	session_start();

	include "../config/config.php";
	include "../config/festivos.php";

//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	
	$code= $code;

	$user_id=$_SESSION['user_id'];
	
	$idcliente=$_POST["idcliente"];
	
	//$idvendedor=$_POST["idvendedor"];

	$producto=$_POST["producto"];
	$finicio = $_POST["finicio"];
    $ncuotas = $_POST["ncuotas"];
    $periodicidad =  $_POST["periodicidad"];
	$Valor =  $_POST["Valor"];    
    $credito =  $_POST["credito"];
    $description = $_POST["description"];


    $valorcuota=$credito/$ncuotas;

    $nuevafecha = strtotime ( '+'.$i.' day' , strtotime ( $finicio ) ) ;



    $festivos = new Festivos();
	


   
    $nuevafecha=$finicio;
    echo("<br>");

	for ($i = 1; $i <= $ncuotas; $i++) {

		//Validacion de la primera Cuota
		if ($i>1) {
		
			//Mensual
			if ($periodicidad==1) {
			$nuevafecha = strtotime ( '+30 day' , strtotime ( $nuevafecha ) ) ;
			}

			//Quincenal
			if ($periodicidad==2) {
			$nuevafecha = strtotime ( '+15 day' , strtotime ( $nuevafecha ) ) ;
			}

			//Semanal
			if ($periodicidad==3) {
			$nuevafecha = strtotime ( '+8 day' , strtotime ( $nuevafecha ) ) ;
			}

			//Diario
			if ($periodicidad==4) {
			$nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
			}

		}else{
			$nuevafecha = strtotime ( '+0 day' , strtotime ( $nuevafecha ) ) ;
		}
		
		$nuevafecha = date ( 'Y/m/d' , $nuevafecha );
		$tipodia=date("w", strtotime($nuevafecha));

		if ($tipodia==0) {
		$nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
		$nuevafecha = date ( 'Y/m/d' , $nuevafecha );
		$tipodia=1;
		}

		//Se valida que si es festivo o no
		$fecha = $nuevafecha;

		if($festivos->esFestivoFecha($fecha)){
		    $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y/m/d' , $nuevafecha );
			$tipodia=$tipodia+1;
		}

		//Se valida que si es festivo o no por wsegunda vez
		$fecha = $nuevafecha;
		
		if($festivos->esFestivoFecha($fecha)){
		    $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
			$nuevafecha = date ( 'Y/m/d' , $nuevafecha );
			$tipodia=$tipodia+1;
		}



		switch ($tipodia) {
	    	case 0:
	        	$namedia="Domingo";
	        	break;
	    	case 1:
	        	$namedia="Lunes";
	        	break;
	    	case 2:
	        	$namedia="Martes";
	        	break;
	        case 3:
	        	$namedia="Miercoles";
	        	break;
	    	case 4:
	        	$namedia="Jueves";
	        	break;
	    	case 5:
	        	$namedia="Viernes";
	        	break;
	        case 6:
	        	$namedia="Sabado";
	        	break;
		}


		//echo($idcliente);
		//echo("  -  	");
		//echo($code);
		//echo("  -  	");
		//echo($nuevafecha);
		//echo("  -  	");
		//echo($namedia);
		//echo("  -  	");
		//echo($producto);
		//echo("  -  	");
		//echo($Valor);    	
		//echo("Cuota ".$i."/".$ncuotas);
		//echo("  -  	"); 
		//echo($credito);
		//echo("  -  	");    	
		//echo($valorcuota);
		//echo("  -  	");    	
		//echo("0");
		//echo("  -  	");
		//echo("  Por Pagar"); //Atrasada, Pagada, Por pagar
		//echo("  -  	");
		//echo($idcobrador);

    	
    	

    	$sql = "INSERT INTO `cuotas` (`id`, `user_id`, `folder_id`, `code`, `fechacuota`, `tipodia`, `producto`, `valorproducto`, `cuota`, `credito`, `valorcuota`, `abono`, `estado`, `description`, `created_at`) VALUES (NULL, '".$idcliente."', '".$user_id."', '".$code."', '".$nuevafecha."', '".$namedia."','".$producto."', '".$Valor."', '"."Cuota ".$i."/".$ncuotas."','".$credito."', '".$valorcuota."', '0','Por Pagar', '".$description."', NOW())";

    	echo($sql);
		echo("<br>");
		
    	$query = mysqli_query($con, $sql);



	}


	$query = mysqli_query($con, $sql);
	if ($query) {
		echo "Cuota creada con exito";
		header("location: ../newcuota.php?success&id=".$idcliente);
	} else {
		echo "hubo un error al crear la Cuota";
		header("location: ../newcuota.php?error&id=".$idcliente);
	}


}

?>