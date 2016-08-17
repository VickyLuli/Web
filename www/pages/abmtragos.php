<?php
		$tragos=file_get_contents("jsonTragos.json","r");
		$trago=json_decode($tragos,true);		
		
		$idTrago=0;
		?>
		
<script>
function confirmar(idTrago)
{
	var ventana = confirm('Deseas eliminar este registro?');
	if(ventana==true)
	{
		window.location= 'borrartragos.php?idTrago='+idTrago;
	}
	else
	{
		alert('No se elimino el registro');	
	}
	
}
</script>

<!DOCTYPE html>
<html lang="en">

	<?php include("head.html"); ?>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
         <?php include("menu.html"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ABM Tragos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default2">
                        <div class="panel-heading">
                            Tragos(ejemplos)
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Descripción</th>
                                            <th>Boliche</th>
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 <button type="submit" name="boton" value="Agregar"  onclick="window.location.href='agregartragos.php'"/>Agregar</button>
                                        <?php
												
													for($i=0;$i<count($trago);$i++){ 
													
													?><tr class="odd gradeX"><?php
														$idTrago= $trago[$i]["idTrago"];
														$nombre	= $trago[$i]["nombre"];
														$precio = $trago[$i]["precio"];
														$descripcion = $trago[$i]["descripcion"];
														$boliche = $trago[$i]["boliche"];
														
														?>
														<td><?php echo $nombre;?></td>
														<td><?php echo $precio;?></td>
														<td><?php echo $descripcion;?></td>
														<td><?php echo $boliche;?></td>
														
														<td>

														<button  onclick="confirmar('<?=$idTrago ?>')" type="submit" value ="borrar" name="borrar">Baja</button>
														<button type="submit" name="boton" value="Modificar"  onclick="window.location.href='modificartragos.php?idTrago=<?=$idTrago?>'"/>Modificar</button></td>
											
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
