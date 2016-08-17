<?php
		$publicidades=file_get_contents("jsonPublicidad.json","r");
		$publicidad=json_decode($publicidades,true);	


		
?>
<!DOCTYPE html>
<html lang="en">
<script>
function confirmar(idPublicidad)
{
	var ventana = confirm('Deseas eliminar este registro?');
	if(ventana==true)
	{
		window.location= 'borrarpublicidad.php?idPublicidad='+idPublicidad;
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
                    <h1 class="page-header">ABM Publicidad</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default2">
                        <div class="panel-heading">
                           Publicidad (ejemplos)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Producto</th>
                                            <th>Fecha de vencimiento</th>
                                            <th>Precio</th>
                                            <th>Descripción</th>
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <button type="submit" name="boton" value="Agregar"  onclick="window.location.href='agregarpublicidad.php'"/>Agregar</button>
											

												<?php
												
													for($i=0;$i<count($publicidad);$i++){ 
													
													?><tr class="odd gradeX"><?php
														$idPublicidad= $publicidad[$i]["idPublicidad"];
														$nombre	= $publicidad[$i]["nombre"];
														$fecha = $publicidad[$i]["fecha"];
														$precio = $publicidad[$i]["precio"];
														$descripcion = $publicidad[$i]["descripcion"];
														
														?>
														<td><?php echo $nombre;?></td>
														<td><?php echo $fecha;?></td>
														<td><?php echo $precio;?></td>
														<td><?php echo $descripcion;?></td>
														
														<td>
														
														<button  onclick="confirmar('<?=$idPublicidad ?>')" type="submit" value ="borrar" name="borrar">Baja</button>
														
														<button type="submit" name="boton" value="Modificar"  onclick="window.location.href='modificarpublicidad.php?idPublicidad=<?=$idPublicidad?>'"/>Modificar</button></td>
											
														</tr>	
													<?php
													}
													?>		
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
    </script>

</body>

</html>
