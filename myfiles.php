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
            <h1>Mis Clientes </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="myfiles.php"><i class="fa fa-archive"></i>Mis Clientes</a></li>
                <?php
                    if(@mysqli_num_rows($folder)!=0){
                        echo '<li class="active"><a href="myfiles.php?folder='.$file_folder_code.'"><i class="fa fa-folder-open"></i> '.$file_folder_filename.'</a></li>';
                    }
                ?>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">
                <?php
                    $files = null;
                    if(@mysqli_num_rows($folder)==0){
                        if(isset($_GET["q"]) && $_GET["q"]!=""){
                            $q=$_GET["q"];
                            $files = mysqli_query($con,"select * from file where user_id=$my_user_id and folder_id is NULL and (filename like '%$q%' or description like '%$q%') order by is_folder desc, filename asc");
                           
                    }else{
                        $files = mysqli_query($con,"select * from file where user_id=$my_user_id and folder_id is NULL order by is_folder desc, filename asc");
                    }

                    }else{
                        // search
                        if(isset($_GET["q"]) && $_GET["q"]!=""){
                            $q=$_GET["q"];
                            $files=mysqli_query($con,"select * from files where folder_id=$file_id_folder and  (filename like '%$q%' or description like '%$q%') order by created_at desc");
                        }else{
                            // folder/folder/file.php
                            $files=mysqli_query($con,"select * from file where folder_id=$file_id_folder order by created_at desc");

                        }
                    }
                ?>


               <?php if(isset($_GET["folder"]) && $_GET["folder"]!="" && mysqli_num_rows($folder)==0):?>
                    <p class="alert alert-danger">Estas intentando acceder a una carpeta que no existe!</p>
                <?php endif; ?>

               

                    <?php if(isset($_GET["q"]) && $_GET["q"]!=""):?>
                        <p class="alert alert-info">Resultado de la busqueda: <?php echo $_GET["q"];?></p>
                    <?php endif; ?>

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
                            <?php if(@mysqli_num_rows($folder)==0):?>
                            <h3 class="box-title">Mis Clientes <i class="fa fa-file"></i></h3>
                            <?php else:?>
                            <h3 class="box-title"><?php echo $file_folder_filename;?> <i class="fa fa-folder"></i></h3>
                            <?php endif;?>
                            <div class="box-tools">
                            </div>
                        </div><!-- /.box-header -->

                        <div class="box-body no-padding">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Archivo</th>
                                        <th>Teléfono</th>
                                        <th>Opciones</th>
                                        
                                    </tr>
                                </thead>    
                                <tbody>    
                                    <?php foreach($files as $file):?>
                                    <tr>

                                        <td>
                                        <a href="cartulinas.php?idcliente=<?php echo $file['id'];?>">
                                        <i class="fa fa-folder"></i>            
                                        <?php echo $file['filename']; ?></a>
                                        </td>

                                        <td><?php echo $file['telefono']; ?></td>
                                        
                                        <td>

                                            <a href="detallecliente.php?id=<?php echo $file['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-info-circle"></i></a>

                                            <a href="newcuota.php?id=<?php echo $file['id']; ?>" class="btn btn-xs btn-success"><i class="fa fa-shopping-basket"></i></a>

                                            <a href="editfile.php?id=<?php echo $file['code']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>

                                            <a href="action/delfile.php?id=<?php echo $file['code']; ?>&tkn=<?php echo $_SESSION["tkn"]?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

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

