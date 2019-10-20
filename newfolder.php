<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nuevo Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo Cliente</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> CLiente creado satisfactioramente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo crear la carpeta.</p>";
                             
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Agregar cliente</h3>
                        </div><!-- /.box-header -->


                        <form role="form" action="action/addfolder.php" method="post"><!-- form start -->
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="name_folder">Nombres y Apellidos</label>
                                    <input type="text" name="filename" class="form-control" id="name_folder" placeholder="Nombre y Apellidos">
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Cumpleaños</label>
                                    <input type="date" name="cumple" class="form-control" id="cumple" placeholder="Nombre del Proceso">
                                </div>

                                
                                <div class="form-group">
                                    <label for="name_address">Teléfono | Whatsapp</label>
                                    <input type="text" name="celular" class="form-control" id="celular" placeholder="300462XXXX">
                                </div>

                                <div class="form-group">
                                    <label for="name_address">Dirección Almacén</label>
                                    <input type="text" name="diralmacen" class="form-control" id="diralmacen" placeholder="Calle 27 # 11 - 11">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name_address">Horário</label>
                                    <input type="time"  class="form-control" name="horarioentrada" id="horarioentrada" value="08:00:00" max="23:00:00" min="01:00:00" step="1">

                                    <input type="time"  class="form-control" name="horariosalida" id="horariosalida" value="18:00:00" max="23:00:00" min="01:00:00" step="1">

                                </div>


                                <div class="form-group">
                                    <label for="name_address">Dirección Casa</label>
                                    <input type="text" name="dircasa" class="form-control" id="dircasa" placeholder="Calle 27 # 11 - 11">
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Cobrador</label>
                                    <SELECT id="idvendedor" name="idvendedor" class="form-control" > 
                                        
                                    
                                    <?php
                                        
                                        $sql2="SELECT * FROM user"; 
                                        $cobradores = mysqli_query($con,$sql2);
                                        foreach($cobradores as $cobrador):
                                            echo('<OPTION VALUE="'.$cobrador['id'].'" value="'.$cobrador['id'].'"> '.$cobrador['fullname'].'');
                                        endforeach;
                                    ?>
                                    </SELECT>

                                </div>
                                

                                <div class="form-group">
                                    <label>Observación</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                                <!--
                                <div class="col-xs-12">
                                    
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" name="is_public"> &nbsp;Archivo Publico
                                        </label>
                                    </div>
                                </div>
                                -->
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Crear Cliente</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>