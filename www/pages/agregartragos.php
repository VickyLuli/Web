
<?php
		$tragos=file_get_contents("jsonTragos.json","r");
		$trag=json_decode($tragos,true);	

		$errores=0;
		$errorNombre="";
		$errorPrecio="";
		$errorBoliche="";
		$errorDescripcion= "";
	
		if (isset($_POST) && count($_POST)>0)
		{
			$indice=count($trag);
			$trag[$indice]["idTrago"]=$trag[count($trag)-1]["idTrago"]+1;
			if (!isset($_POST["nombre"]))
			{
				$errorNombre="No completo el nombre";
				$errores=1;
				
			}
			else
			{
				if ($_POST["nombre"]=="")
				{
					$errorNombre="El nombre no puede ser vacio";
					$errores=1;
				}
				else
				{
					$trag[$indice]["nombre"]=$_POST["nombre"];
				}
			}
			
			
			if (!isset($_POST["precio"]))
			{
				$errorPrecio="No completo el precio";
				$errores=1;
			}
			else
			{
				if ($_POST["precio"]=="")
				{
					$errorPrecio="El precio no puede ser vacia";
					$errores=1;
				}
				else
				{
					$trag[$indice]["precio"]=$_POST["precio"];
				}
			}
			
			
			if (!isset($_POST["descripcion"]))
			{
				$errorDescripcion="No completo la descripcion";
				$errores=1;
			}
			else
			{
				
				if ($_POST["descripcion"]=="")
				{
					$errorDescripcion="La descripcion no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$trag[$indice]["descripcion"]=$_POST["descripcion"];
				}
				
			}
			if (!isset($_POST["boliche"]))
			{
				$errorBoliche="No completo el boliche";
				$errores=1;
			}
			else
			{
				
				if ($_POST["boliche"]=="")
				{
					$errorBoliche="El boliche no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$trag[$indice]["boliche"]=$_POST["boliche"];
				}
			}
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$traguito = json_encode($trag,true);
			file_put_contents("jsonTragos.json",$traguito);
			header("Location: abmtragos.php");
		}

		if ((!isset($_POST) || !count($_POST)>0)||$errores==1)
	{
?>

<?php include("head.html"); ?>


    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include("menu.html"); ?>
        </nav>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Trago</h1>
                </div>
             </div>
            <div class="row">
                <div class="col-lg-12">
				<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Agrega un trago
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
									<center>


										<form id="form" action="agregartragos.php" method="POST">
							<input placeholder="Nombre" type="text" name="nombre" id="nombre" class="form-control"><?=$errorNombre?></br>
							<input placeholder="Precio" type="text" name="precio" id="precio" class="form-control"><?=$errorPrecio?></br>
							<input placeholder="Descripcion" type="text" name="descripcion" id="descripcion" class="form-control"><?=$errorDescripcion?></br>
							<input placeholder="Boliche" type="text" name="boliche" id="boliche" class="form-control"><?=$errorBoliche?></br>
				
							<input type="submit" name="ok" value="Aceptar" id="button" href="agregartragos.php" class="btn btn-default">
						</form>
						<button type="submit" name="button" onclick="window.location.href='abmtragos.php'" class="btn btn-default"/>Cancelar</button>
									
									</center>

									
									</div>
									<!-- /.col-lg-12 (nested) -->
								</div>
								<!-- /.row (nested) -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			 
		</div>
    </div>
<?php
	}
?>
