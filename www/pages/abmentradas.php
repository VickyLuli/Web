<?php
		$even=file_get_contents("jsonEntradas.json","r");
		$evento=json_decode($even,true);	

	
?>
<!DOCTYPE html>
<html lang="en">
<script>
function confirmar(idEntrada)
{
	var ventana = confirm('Deseas eliminar este registro?');
	if(ventana==true)
	{
		window.location= 'borrarentrada.php?idEntrada='+idEntrada;
	}
	else
	{
		alert('No se elimino el registro');	
	}
	
}
</script>

<?php include("head.html"); ?>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <?php include("menu.html"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ABM Entradas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default2">
                        <div class="panel-heading">
                            Entradas(ejemplos)
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										    <th>Boliche</th>
                                            <th>Precio</th>
                                            <th>Fecha de vencimiento</th>
                                            <th>Día y hora</th>
                                            <th>Cantidad total</th>
								
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <button type="submit" name="boton" value="Agregar"  onclick="window.location.href='agregarentrada.php'"/>Agregar</button>
											

												<?php
												
													for($i=0;$i<count($evento);$i++){ 
													
													?><tr class="odd gradeX"><?php
														$idEntrada= $evento[$i]["idEntrada"];
														$boliche= $evento[$i]["boliche"];
														$precio = $evento[$i]["precio"];
														$fecha = $evento[$i]["fecha"];
														$diahora = $evento[$i]["diahora"];
														$total = $evento[$i]["total"];
														
														
														
														?>
														<td><?php echo $boliche;?></td>
														<td><?php echo $precio;?></td>
														<td><?php echo $fecha;?></td>
														<td><?php echo $diahora;?></td>
														<td><?php echo $total;?></td>
														
																												
														<td>
														
														<button  onclick="confirmar('<?=$idEntrada ?>')" type="submit" value ="borrar" name="borrar">Baja</button>
														
														<button type="submit" name="boton" value="Modificar"  onclick="window.location.href='modificarentrada.php?idEntrada=<?=$idEntrada?>'"/>Modificar</button></td>
											
														</tr>	
													<?php
													}
													?>				
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </script>

</body>

</html>
