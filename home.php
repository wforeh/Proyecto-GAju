<?php 
    $active1="active";
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 


    $count_files = mysqli_query($con, "SELECT * FROM pr_liquidaciones where iduser = ".$_SESSION["user_id"]);
    $count_download = mysqli_query($con, "select sum(download) as download from file");
    $count_user=mysqli_query($con, "select * from user");
    $count_comments=mysqli_query($con, "select * from comment");


    $insolvencias = mysqli_query($con, "SELECT *  FROM pr_insolvencias where iduser = ".$_SESSION["user_id"]);
    $liquidciones = mysqli_query($con, "SELECT * FROM pr_liquidaciones where iduser = ".$_SESSION["user_id"]);
    $Reorganizaciones = mysqli_query($con, "SELECT * FROM pr_reorganizaciones where iduser = ".$_SESSION["user_id"]);


?>
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Dashboard<small>Panel de control</small> </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->


            <div class="row"><!-- Small boxes (Stat box) -->

                

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow"><!-- small box -->
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_user); ?></h3>
                            <p>USUARIOS</p>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->



                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($liquidciones); ?></h3>
                            <p>LIQUIDACIONES</p>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->




                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($insolvencias); ?></h3>
                            <p>INSOLVENCIAS</p>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($Reorganizaciones); ?></h3>
                            <p>REORGANIZACIONES</p>
                        </div>
                        <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->


            </div><!-- /.row -->


           
        </section>
    </div><!-- /.content -->
 
    
    
<?php include "footer.php"; ?>



