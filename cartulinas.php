<?php 
    $active2="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
?>
<?php 
    $alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
    $token = "";
    for($i=0;$i<6;$i++){
        $token .= $alphabeth[rand(0,strlen($alphabeth)-1)];
    }
    $_SESSION["tkn"]=$token;

        
        $idcliente=$_GET["idcliente"];
        echo ($idcliente);
        $cartulina = mysqli_query($con,"SELECT * FROM cuotas where user_id =".$idcliente);

       // while ($row=mysqli_fetch_array($cartulina)) {
        //    $cuota=$row['cuota']; 
         //   echo($cuota); 
        //}
    

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Mis Procesos </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="myfiles.php"><i class="fa fa-archive"></i>Mis Clientes</a></li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">

                    <?php
                         // get messages
                        if (isset($_GET['delsuccess'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>Eliminado exitosamente!</p>";
                        }elseif(isset($_GET['delerror'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> Hubo un error al eliminar el archivo, puede que contenga archivos dentro.</p>";
                        }elseif (isset($_GET['delinvalid'])) {
                            echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> Permiso Denegado!.</p>";
                        }
                    ?>

                    <div class="box">
                        <div class="box-header">
                           
                            <h3 class="box-title">Mis Archivos <i class="fa fa-file"></i></h3>
                        </div><!-- /.box-header -->

                        <div class="box-body no-padding">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>cuota</th>
                                        <th>credito</th>
                                        <th>opciones</th>

                                    </tr>
                                </thead>    
                                <tbody>    
                                    <?php foreach($cartulina as $file):?>
                                    <tr>

                                        <td style="width: 350px"><?php echo $file['cuota']; ?></td>
                                        <td style="width: 350px"><?php echo $file['credito']; ?></td>
                                        <td style="width:223px;">
                                            <a href="filepermision.php?id=<?php echo $file['code']; ?>" class="btn btn-xs btn-default"><i class="fa fa-globe"></i> Compartir</a>
                                            <a href="editfile.php?id=<?php echo $file['code'];?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                            <a href="action/delfile.php?id=<?php echo $file['code']; ?>&tkn=<?php echo $_SESSION["tkn"]?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                        </div><!-- /.box-body --><br>
                    </div><!-- /.box -->
                
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>