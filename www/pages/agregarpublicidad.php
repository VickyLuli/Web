<?php
		$publicidades=file_get_contents("jsonPublicidad.json","r");
		$publi=json_decode($publicidades,true);	

		$errores=0;
		$errorNombre="";
		$errorFecha="";
		$errorPrecio="";
		$errorDescripcion= "";
	
		if (isset($_POST) && count($_POST)>0)
		{
			$indice=count($publi);
			$publi[$indice]["idPublicidad"]=$publi[count($publi)-1]["idPublicidad"]+1;
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
					$publi[$indice]["nombre"]=$_POST["nombre"];
				}
			}
			
			
			if (!isset($_POST["fecha"]))
			{
				$errorFecha="No completo la fecha";
				$errores=1;
			}
			else
			{
				if ($_POST["fecha"]=="")
				{
					$errorFecha="La fecha no puede ser vacia";
					$errores=1;
				}
				else
				{
					$publi[$indice]["fecha"]=$_POST["fecha"];
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
					$errorPrecio="El precio no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$publi[$indice]["precio"]=$_POST["precio"];
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
					$publi[$indice]["descripcion"]=$_POST["descripcion"];
				}
			}
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$publicc = json_encode($publi,true);
			file_put_contents("jsonPublicidad.json",$publicc);
			header("Location: abmpublicidad.php");
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
                    <h1 class="page-header">Agregar Publicidad</h1>
                </div>
             </div>
            <div class="row">
                <div class="col-lg-12">
				<center>

					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Agrega una publicidad
								</center>

							</div>
							<div class="panel-body">
			<form id="form" action="agregarpublicidad.php" method="POST">
							<input placeholder="Nombre" type="text" name="nombre" id="nombre" class="form-control"><?=$errorNombre?></br>
							<input placeholder="Fecha de vto" type="text" name="fecha" id="fecha" class="form-control"><?=$errorFecha?></br>
							<input placeholder="Precio" type="text" name="precio" id="precio" class="form-control"><?=$errorPrecio?></br>
							<input placeholder="Descripcion" type="text" name="descripcion" id="descripcion" class="form-control"><?=$errorDescripcion?></br>
				
							<input type="submit" name="ok" value="Aceptar" id="button" href="agregarpublicidad.php" class="btn btn-default">
			</form>
			<button type="submit" name="button" onclick="window.location.href='abmpublicidad.php'" class="btn btn-default"/>Cancelar</button>
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
