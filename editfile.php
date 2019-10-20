<?php 
$active2="active";
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 


$id_code=$_GET["id"];
$file = mysqli_query($con, "select * from file where code=\"$id_code\"");
while ($rows=mysqli_fetch_array($file)) {
    $id=$rows['id'];
    $filename=$rows['filename'];
    $code=$rows['code'];

    $telefono=$rows['telefono'];
    $idvendedor=$rows['idvendedor'];
    $cumple=$rows['cumple'];
    $diralmacen=$rows['diralmacen'];
    $horarioentrada=$rows['horarioentrada'];
    $horariosalida=$rows['horariosalida'];
    $dircasa=$rows['dircasa'];

    $is_public=$rows['is_public'];
    $description=$rows['description'];
}

?>
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Editar Archivo <small><?php echo $filename;?></small> </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Editar Archivo </li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Archivo actualizado correctamente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo actualizar el archivo.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-pencil">Actualizar Cliente: </i><a href="file.php?code=<?php echo $code; ?>"> <?php echo $filename; ?></a></h3>
                        </div><!-- /.box-header -->
                        <form action="action/editfile.php" method="post" role="form"><!-- form start -->
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="name_folder">Nombres y Apellidos</label>
                                    <input type="text" name="filename" class="form-control" id="name_folder" value="<?php echo $filename;?>">
                                </div>



                                <div class="form-group">
                                    <label for="name_folder">Cumpleaños</label>
                                    <input type="date" name="cumple" class="form-control" id="cumple" value="<?php echo $cumple;?>">
                                </div>

                                
                                <div class="form-group">
                                    <label for="name_address">Teléfono | Whatsapp</label>
                                    <input type="text" name="celular" class="form-control" id="celular" value="<?php echo $telefono;?>">
                                </div>

                                <div class="form-group">
                                    <label for="name_address">Dirección Almacén</label>
                                    <input type="text" name="diralmacen" class="form-control" id="diralmacen" value="<?php echo $diralmacen;?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name_address">Horário</label>
                                    <input type="time"  class="form-control" name="horarioentrada" id="horarioentrada" value="<?php echo $horarioentrada;?>" max="23:00:00" min="01:00:00" step="1">

                                    <input type="time"  class="form-control" name="horariosalida" id="horariosalida" value="<?php echo $horariosalida;?>" max="23:00:00" min="01:00:00" step="1">

                                </div>


                                <div class="form-group">
                                    <label for="name_address">Dirección Casa</label>
                                    <input type="text" name="dircasa" class="form-control" id="dircasa" value="<?php echo $dircasa;?>">
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Cobrador</label>
                                    <SELECT id="idvendedor" name="idvendedor" class="form-control" > 
                                        
                                    
                                    <?php
                                        
                                        $sql2="SELECT * FROM user"; 
                                        $cobradores = mysqli_query($con,$sql2);
                                        foreach($cobradores as $cobrador):
                                            if($cobrador['id']==$idvendedor){
                                            echo('<OPTION VALUE="'.$cobrador['id'].'" value="'.$cobrador['id'].'" selected > '.$cobrador['fullname'].'');
                                            }else{
                                            echo('<OPTION VALUE="'.$cobrador['id'].'" value="'.$cobrador['id'].'"> '.$cobrador['fullname'].'');
                                            }
                                        endforeach;
                                    ?>
                                    </SELECT>

                                </div>




                                <div class="form-group">
                                    <label>Descripción</label>
                                        <textarea name="description" class="form-control" rows="3"><?php echo $description;?></textarea>
                                </div>
   
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <button type="submit" class="btn btn-success">Actualizar Archivo</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->


<?php include "footer.php"; ?>