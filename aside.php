    
<?php 
    
    $insolvencias = mysqli_query($con, "SELECT *  FROM pr_insolvencias where iduser = ".$_SESSION["user_id"]);
    $liquidciones = mysqli_query($con, "SELECT * FROM pr_liquidaciones where iduser = ".$_SESSION["user_id"]);
    $Reorganizaciones = mysqli_query($con, "SELECT * FROM pr_reorganizaciones where iduser = ".$_SESSION["user_id"]);

$_SESSION["user_id"]




    //echo $insolvencias;

?>





    <aside class="main-sidebar"><!-- Left side column. contains the logo and sidebar -->
        <section class="sidebar"><!-- sidebar: style can be found in sidebar.less -->
            <div class="user-panel"> <!-- Sidebar user panel -->
                <div class="pull-left image">
                    <img src="images/profiles/<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $fullname; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu"><!-- sidebar menu: : style can be found in sidebar.less -->
                <li class="header">NAVEGACIÓN</li>

                <li class="treeview">
                <a href="#">
                    <i class="fa fa fa-user"></i>
                    <span>Usuarios</span>
                    <span class="pull-right-container">
                    <span class="label label-primary pull-right"></span>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li>
                    <a href="perfil.php"><i class="fa fa-outdent"></i> Mi Perfil</a>
                    <a href="newuser.php"><i class="fa fa-user-plus"></i> Nuevo Usuario</a>
                </li>
                </ul>

                </li>


                <li class="treeview">

                        <a href="">
                            <i class="fa fa-sitemap"></i>
                            <span>Mis Procesos</span>
                            <span class="pull-right-container">
                            <span class="label label-primary pull-right"><?php echo (mysqli_num_rows($liquidciones)+mysqli_num_rows($insolvencias)+mysqli_num_rows($Reorganizaciones));?></span>
                            </span>
                        </a>

                        <ul class="treeview-menu">

                            <li>
                                    <li class="treeview">

                                            <a href="#">
                                                <i class="fa fa-flag"></i>
                                                <span>Liquidación</span>
                                                <span class="pull-right-container">
                                                <span class="label label-primary pull-right"><?php echo mysqli_num_rows($liquidciones);?></span>
                                                </span>
                                            </a>

                                            <ul class="treeview-menu">
                                                
                                                <li>

                                                    <?php
                                                    
                                                    //test/demo_form.php?name1=value1&name2=value2
                                        
                                                        foreach($liquidciones as $procliq):
                                                            echo ('<a href="viewprocesos.php?tipo=1&id='.$procliq['id'].'"><i class="fa fa-circle-o"></i>'.$procliq['nombreproceso'].'</a>');                                                          
                                                        endforeach;
                                                    ?>                                                  
                                                    <a href="newliquidacion.php"><i class="fa fa-plus"></i> Nueva Liquidación</a>
                                                    
                                                </li>
                                            </ul>

                                    </li>

                                    <li class="treeview">

                                            <a href="#">
                                                <i class="fa fa-flag-checkered"></i>
                                                <span>Reorganización</span>
                                                <span class="pull-right-container">
                                                <span class="label label-primary pull-right"><?php echo mysqli_num_rows($Reorganizaciones);?></span>
                                                </span>
                                            </a>

                                            <ul class="treeview-menu">
                                                
                                                <li>  

                                                   <?php
                                        
                                                        foreach($Reorganizaciones as $procliq):
                                                            echo ('<a href="viewprocesos.php?tipo=2&id='.$procliq['id'].'"><i class="fa fa-circle-o"></i>'.$procliq['nombreproceso'].'</a>');                                                          
                                                        endforeach;
                                                    ?>
                                                    <a href="newreorganizacion.php"><i class="fa fa-plus"></i> Nueva Reorganización</a>
                                                    
                                                </li>
                                            </ul>

                                    </li>


                                     <li class="treeview">

                                            <a href="#">
                                                <i class="fa fa-flag-o"></i>
                                                <span>Insolvencia</span>
                                                <span class="pull-right-container">
                                                <span class="label label-primary pull-right"><?php echo mysqli_num_rows($insolvencias);?></span>
                                                </span>
                                            </a>

                                            <ul class="treeview-menu">
                                                
                                                <li>
                                                    <?php
                                        
                                                        foreach($insolvencias as $procliq):
                                                            echo ('<a href="viewprocesos.php?tipo=3&id='.$procliq['id'].'"><i class="fa fa-circle-o"></i>'.$procliq['nombreproceso'].'</a>');                                                          
                                                        endforeach;
                                                    ?>
                                                    <a href="newinsolvencia.php"><i class="fa fa-plus"></i> Nueva Insolvencia</a>
                                                    
                                                </li>
                                            </ul>

                                    </li>

                            </li>


                        </ul>

                </li>




                <!--<li class="<?php if(isset($active1)){echo $active1;}?>">
                    <a href="perfil.php"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
                </li>
                <li class="<?php if(isset($active3)){echo $active3;}?>">
                    <a href="newuser.php"><i class="fa fa-globe"></i> <span>Registro Usuarios</span></a>
                </li>

                <li class="<?php if(isset($active4)){echo $active4;}?>">
                    <a href="newfolder.php"><i class="fa fa-folder"></i> <span>Nuevo Cliente</span></a>
                </li>

                <li class="<?php if(isset($active2)){echo $active2;}?>">
                    <a href="myfiles.php"><i class="fa fa-archive"></i> <span>Mis Clientes</span></a>
                </li>   -->
                          


                
                
                <!--

                <li class="<?php if(isset($active5)){echo $active5;}?>">
                    <a href="newfile.php"><i class="fa fa-upload"></i> <span>Nuevo Archivo</span></a>
                </li>-->

                <!--<li class="<?php if(isset($active6)){echo $active6;}?>">
                    <a href="about.php"><i class="fa fa-smile-o"></i> <span>Acerca del autor</span></a>
                </li>-->

            </ul>
        </section><!-- /.sidebar -->
    </aside>
    
