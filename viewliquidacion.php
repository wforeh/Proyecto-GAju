<?php 
    $active2="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 


    $id=$_GET["id"];
    $tipo=$_GET["tipo"];


?>
<?php 
    $alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
    $token = "";
    for($i=0;$i<6;$i++){
        $token .= $alphabeth[rand(0,strlen($alphabeth)-1)];
    }
    $_SESSION["tkn"]=$token;
    $folder=null;
    if(isset($_GET["folder"]) && $_GET["folder"]!=""){
        
        $id_folder=$_GET["folder"];
        $folder = mysqli_query($con,"select * from file where code=\"$id_folder\"");

        while ($row=mysqli_fetch_array($folder)) {
            $file_id_folder=$row['id']; 
            $file_folder_id=$row['folder_id']; 
            $file_folder_filename=$row['filename'];
            $file_folder_code=$row['code'];
        }
    }

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>LIQUIDACIÓN</h1>
        </section>




        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">
                <?php



                    $files = mysqli_query($con,"SELECT * FROM pr_liquidaciones where iduser = ".$_SESSION["user_id"]." and id =".$id);
                ?>


                    <?php if(@mysqli_num_rows($files)>0):?>

                    <?php
                         // get messages
                        if (isset($_GET['delsuccess'])) {
                            echo "<p class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>x</button><i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>Eliminado exitosamente!</p>";
                        }elseif(isset($_GET['delerror'])) {
                             echo "<p class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>x</button><i class=' fa fa-exclamation-circle'></i> Hubo un error al eliminar el archivo, puede que contenga archivos dentro.</p>";
                        }elseif (isset($_GET['delinvalid'])) {
                            echo "<p class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>x</button> <i class=' fa fa-exclamation-circle'></i> Permiso Denegado!.</p>";
                        }
                    ?>

                    <div class="box">
                        <div class="box-header">

                        </div><!-- /.box-header -->

                        <div class="box-body no-padding">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                        
                                    </tr>
                                </thead>    
                                <tbody>    
                                    <?php foreach($files as $file):?>
                                    <tr>

                                        <td>
                                        <a href="cartulinas.php?idcliente=<?php echo $file['id'];?>">
                                        <i class="fa fa-folder"></i>            
                                        <?php echo $file['nombreproceso']; ?></a>
                                        </td>

                                         <td>50%</td>
                                        
                                        <td>

                                            <a href="detallecliente.php?id=<?php echo $file['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-info-circle"></i>Formulario</a>

                                            <a href="editfile.php?id=<?php echo "1"; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Editar</a>

                                            <a href="action/delfile.php?id=<?php echo $file['code']; ?>&tkn=<?php echo $_SESSION["tkn"]?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a>

                                            <a href="detallecliente.php?id=<?php echo $file['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-info-circle"></i> Adjuntar</a>


                                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Launch demo modal </button>--> 

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                        </div><!-- /.box-body --><br>
                    </div><!-- /.box -->
                    <?php else:?>
                       <div class="col-md-6 col-md-offset-3">
                        <p class="alert alert-warning"> <i class="
                        fa fa-exclamation-triangle"></i> No se encontraron archivos en la carpeta actual</p>
                       </div>
                    <?php endif;?>
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>

