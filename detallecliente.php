<?php 
    $active2="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
?>
<?php 
        $id=$_GET["id"];
        echo ($id);
        $cartulina = mysqli_query($con,"SELECT * FROM file where id =".$id);
    
?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Detalle Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="myfiles.php"><i class="fa fa-dashboard"></i> Mis Clientes</a></li>
                <li class="active"><a href="#"><i class="fa fa-archive"></i>Detalle Cliente</a></li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header">

                        </div>

                        <table class="table table-hover">

                        <tbody>
                            <?php foreach($cartulina as $file):?>

                                <tr>
                                    <th scope="row">Nombre</th>
                                    <td><?php echo $file['filename']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Telefono</th>
                                    <td><?php echo $file['telefono']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cobrador</th>
                                    <td><?php 
                                    $sql2="SELECT * FROM `user` where id = ".$file['idvendedor']; 
                                    $cobradores = mysqli_query($con,$sql2);
                                    foreach($cobradores as $cobrador):
                                        echo $cobrador['fullname'];
                                    endforeach;
                                    ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cumpleaños</th>
                                    <td><?php echo $file['cumple']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Dir. Almacen</th>
                                    <td><?php echo $file['diralmacen']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Horario</th>
                                    <td><?php echo ("Desde: ".$file['horarioentrada']."<br>Hasta: ".$file['horariosalida']); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Dir. Casa</th>
                                    <td><?php echo $file['dircasa']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Observaciones</th>
                                    <td><?php echo $file['description']; ?></td>
                                </tr>

                            <?php endforeach; ?>
                          
                        </tbody>
                        </table>
                    <br>
                    </div><!-- /.box -->
                
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>