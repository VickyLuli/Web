<?php
		$boliches=file_get_contents("jsonBoli.json","r");
		$boli=json_decode($boliches,true);	


		
?>
<script>
function confirmar(idboli)
{
	var ventana = confirm('Deseas eliminar este registro?');
	if(ventana==true)
	{
		window.location= 'borrarboliche.php?idBoliche='+idboli;
	}
	else
	{
		alert('No se elimino el registro');	
	}
	
}
</script>
<?php include("head.html"); ?>


    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include("menu.html"); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ABM Boliches</h1>
                </div>
            </div>
            
              
                    <div class="panel panel-default2">
                        <div class="panel-heading">
                            Boliches(ejemplos)
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Estilo Musical</th>
                                            <th>Capacidad</th>
											<th>Días de apertura</th>
											<th>Rango de edad</th>
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
													
												<button type="submit" name="boton" value="Agregar"  onclick="window.location.href='agregarboliche.php'"/>Agregar</button>
											

												<?php
												
													for($i=0;$i<count($boli);$i++){ 
													
													?><tr class="odd gradeX"><?php
														$idboli= $boli[$i]["idboliche"];
														$nombre	= $boli[$i]["nombre"];
														$direccion = $boli[$i]["direccion"];
														$telefono = $boli[$i]["telefono"];
														$musica = $boli[$i]["musica"];
														$capacidad = $boli[$i]["capacidad"];
														$apertura = $boli[$i]["apertura"]; 
														$edad = $boli[$i]["edad"];
														
														?>
														<td><?php echo $nombre;?></td>
														<td><?php echo $direccion;?></td>
														<td><?php echo $telefono;?></td>
														<td><?php echo $musica;?></td>
														<td><?php echo $capacidad;?></td>
														<td><?php echo $apertura;?></td>
														<td><?php echo $edad;?></td>
														
														<td>
														
														<button  onclick="confirmar('<?=$idboli ?>')" type="submit" value ="borrar" name="borrar">Baja</button>
														
														<button type="submit" name="boton" value="Modificar"  onclick="window.location.href='modificarboliche.php?idBoliche=<?=$idboli?>'"/>Modificar</button></td>
											
														</tr>	
													<?php
													}
													?>																
                                    </tbody>
                                </table>
								
                         
                            
                        </div>
 
                    

                </div>
              
            </div>
            
    </script>

</body>

</html>

