
<?php
		$publicidades=file_get_contents("jsonPublicidad.json","r");
		$publi=json_decode($publicidades,true);	
		
if(isset($_GET["idPublicidad"])){
		
		$errores=0;
		$errorNombre="";
		$errorFecha="";
		$errorPrecio="";
		$errorDescripcion= "";
		$idBolichee=$_GET["idPublicidad"]-1;
		$nombrePubli= $publi[$idBolichee]["nombre"];
		$fechaPubli= $publi[$idBolichee]["fecha"];
		$precioPubli= $publi[$idBolichee]["precio"];
		$descrip= $publi[$idBolichee]["descripcion"];	

			
		if (isset($_POST) && count($_POST)>0)
		{

			
			$publi[$idBolichee]["idPublicidad"]=$publi[count($publi)-1]["idPublicidad"];
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
					$publi[$idBolichee]["nombre"]=$_POST["nombre"];
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
					$publi[$idBolichee]["fecha"]=$_POST["fecha"];
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
					$publi[$idBolichee]["precio"]=$_POST["precio"];
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
					$publi[$idBolichee]["descripcion"]=$_POST["descripcion"];
				}
			}
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$pub = json_encode($publi,true);
			file_put_contents("jsonPublicidad.json",$pub);
			
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
                    <h1 class="page-header">Modificar Publicidad</h1>
                </div>
             </div>
			 
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Modifica los datos de la publicidad
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
									<center>

	
			<form id="form" action='modificarpublicidad.php?idPublicidad=<?=$_GET["idPublicidad"]?>' method="POST">
							<label for= "nombre">Nombre</label> <input class="form-control" type="text" name="nombre" id="nombre" value="<?=$nombrePubli?>" class="form-control"><?=$errorNombre?></br>
							<label for= "fecha">Fecha de vto</label> <input type="text" name="fecha" id="fecha" value="<?=$fechaPubli?>" class="form-control"><?=$errorFecha?></br>
							<label for= "precio">Precio</label> <input type="text" name="precio" id="precio" value="<?=$precioPubli?>" class="form-control"><?=$errorPrecio?></br>
							<label for= "descripcion">Descripcion</label> <input type="text" name="descripcion" id="descripcion" value="<?=$descrip?>" class="form-control"><?=$errorDescripcion?></br>
				
							<input type="submit" name="ok" value="Aceptar" id="button" class="btn btn-default">
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
}
?>

