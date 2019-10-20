<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nueva cuota</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nueva cuota</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages


                        //echo ($_GET['id']);

                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Carpeta creada satisfactioramente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo crear la carpeta.</p>";

                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Agregar cliente</h3>
                        </div><!-- /.box-header -->
    
    


                        <form name="calculo" role="form" action="action/addcuotas.php" method="post"><!-- form start -->
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="name_folder">Id Cliente</label>
                                    <input type="text" name="idcliente" class="form-control" id="idcliente" readonly
                                    value=
                                    <?php echo ($_GET['id']); ?>                                
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Producto</label>
                                    <input type="text" name="producto" class="form-control" id="producto" placeholder="Reloj Yess 67S8A">
                                </div>

                                

                                <div class="form-group">
                                    <label for="name_address">Valor Producto</label>
                                    <input type="number"  class="form-control" name="Valor" id="Valor" min="0" value="0" onchange="funcion_calcular()">
                                </div>


                                <div class="form-group">
                                    <label for="name_address">Abono</label>
                                    <input type="number"  class="form-control" name="abono" id="abono" min="0" value="0" onchange="funcion_calcular()">
                                </div>



                                <div class="form-group">
                                    <label for="name_address">Total Crédito</label>
                                    <input type="number"  class="form-control" name="credito" id="credito" placeholder="0" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="name_address">Fecha Inicio (Primera Cuota)</label>
                                    <input type="date" name="finicio" class="form-control" id="finicio">
                                </div>

                                <div class="form-group">
                                    <label for="name_address">Número Cuotas</label>
                                    <input type="number" name="ncuotas" class="form-control" value="1" id="ncuotas" placeholder="3">
                                </div>

                                <div class="form-group">
                                    <label for="name_folder">Tipo</label>
                                    <SELECT id="periodicidad" name="periodicidad" class="form-control" >  
                                      <OPTION VALUE="1" value="1"> Mensual
                                      <OPTION VALUE="2" value="2"> Quincenal   
                                      <OPTION VALUE="3" value="3"> Semanal  
                                      <OPTION VALUE="4" value="4"> Diario
                                    </SELECT>

                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="name_folder">Cobrador</label>
                                    <SELECT id="idvendedor" name="idvendedor" class="form-control" >  
                                      <OPTION VALUE="1" value="1"> Helena
                                      <OPTION VALUE="2" value="2"> Orlando   
                                      <OPTION VALUE="3" value="3"> Lency  
                                      <OPTION VALUE="4" value="4"> Andrea
                                    </SELECT>

                                </div>
                                -->
                                                            

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
                                <button type="button" class="btn btn-primary"  onclick="Simular_cuota()">Simular</button>
                                <button type="submit" class="btn btn-primary">Vender</button>
                                
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>

<script type="text/javascript">
function funcion_calcular()
{
var valor = document.calculo.Valor.value;
var abono = document.calculo.abono.value;
document.calculo.credito.value = valor-abono;
}

function Simular_cuota()
{
var valor = document.calculo.Valor.value;
var abono = document.calculo.abono.value;
var ncuotas = document.calculo.ncuotas.value;

var calculocuota = ((valor-abono)/ncuotas);
alert ('Serían ' + ncuotas + ' Cuotas por un valor de: ' + calculocuota);
}


</script>