<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nuevo Usuario</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Usuario creado satisfactioramente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo crear el usuario, ya existe.</p>";
                             
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Agregar cliente</h3>
                        </div><!-- /.box-header -->


                        <form method="post" id="add" name="add" action="action/addusuario.php">
                        <div class="form-group has-feedback">
                            <input type="text" name="fullname" class="form-control" placeholder="Nombre y apellidos" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <SELECT id="perfil" name="perfil" class="form-control" > 
                            <OPTION VALUE="1" value="1">ADMINISTRADOR
                            <OPTION VALUE="2" value="2">AGENTE
                            
                            </SELECT>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button id="save_data"  type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                        </div>
                    </form>                        
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>