<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Seleccionar Usuario</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Seleccionar Usuario</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> ".$_GET['success'].".</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>".$_GET['error']."</p>";                             
                        }elseif(isset($_GET['invalid'])) {
                            echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>".$_GET['invalid']."</p>";
                            
                       }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Agregar cliente</h3>
                        </div><!-- /.box-header -->


                        <form method="post" id="add" name="add" action="perfilexterno.php">

                        <div class="form-group has-feedback">
                            <SELECT id="idexterno" name="idexterno" class="form-control" > 
                            <?php
                                        
                                        $sql2="SELECT * FROM user"; 
                                        $cobradores = mysqli_query($con,$sql2);
                                        foreach($cobradores as $cobrador):
                                            echo('<OPTION VALUE="'.$cobrador['id'].'" value="'.$cobrador['id'].'"> '.$cobrador['fullname'].'');
                                        endforeach;
                                    ?>
                            </SELECT>
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