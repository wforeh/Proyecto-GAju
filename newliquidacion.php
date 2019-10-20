<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nueva liquidación</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Nueva liquidación</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Proceso de liquidación creado correctamente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo crear el proceso.</p>";
                             
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Agregar cliente</h3>
                        </div><!-- /.box-header -->


                        <form role="form" action="action/addliquidacion.php" method="post"><!-- form start -->
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="name_folder">Nombre del proceso liquidación</label>
                                    <input type="text" name="nombreproceso" class="form-control" id="nombreproceso" placeholder="Proceso de Prueba">
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Campo Prueba 1</label>
                                    <input type="text" name="campo1" class="form-control" id="campo1" placeholder="campo prueba">
                                </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Crear Proceso</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>