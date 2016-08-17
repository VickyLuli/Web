
<?php
		$tragos=file_get_contents("jsonTragos.json","r");
		$tragu=json_decode($tragos,true);	
		
if(isset($_GET["idTrago"])){
		
		$errores=0;
		$errorNombre="";
		$errorBoliche="";
		$errorPrecio="";
		$errorDescripcion= "";
		$idTragoo=$_GET["idTrago"]-1;
		$caca= $tragu[$idTragoo]["idTrago"];
		$nombreTrago= $tragu[$idTragoo]["nombre"];
		$bolicheTrago= $tragu[$idTragoo]["boliche"];
		$precioTrago= $tragu[$idTragoo]["precio"];
		$descrip= $tragu[$idTragoo]["descripcion"];	

			
		if (isset($_POST) && count($_POST)>0)
		{

			$tragu[$idTragoo]["idTrago"]=$tragu[count($tragu)-1]["idTrago"];
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
					$tragu[$idTragoo]["nombre"]=$_POST["nombre"];
				}
			}
			
			if (!isset($_POST["boliche"]))
			{
				$errorFecha="No completo la boliche";
				$errores=1;
			}
			else
			{
				if ($_POST["boliche"]=="")
				{
					$errorFecha="La boliche no puede ser vacia";
					$errores=1;
				}
				else
				{
					$tragu[$idTragoo]["boliche"]=$_POST["boliche"];
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
					$tragu[$idTragoo]["precio"]=$_POST["precio"];
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
					$tragu[$idTragoo]["descripcion"]=$_POST["descripcion"];
				}
			}
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$tra = json_encode($tragu,true);
			file_put_contents("jsonTragos.json",$tra);
			
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
                    <h1 class="page-header">Modificar Trago</h1>
                </div>
             </div>
			 
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Modifica los datos del trago
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">	
<center>
			<form id="form" action='modificartragos.php?idTrago=<?=$_GET["idTrago"]?>' method="POST">
							<label for= "nombre">Nombre</label> <input class="form-control" type="text" name="nombre" id="nombre" value="<?=$nombreTrago?>" class="form-control"><?=$errorNombre?></br>
							<label for= "precio">Precio</label> <input type="text" name="precio" id="precio" value="<?=$precioTrago?>" class="form-control"><?=$errorPrecio?></br>
							<label for= "descripcion">Descripcion</label> <input type="text" name="descripcion" id="descripcion" value="<?=$descrip?>" class="form-control"><?=$errorDescripcion?></br>
							<label for= "boliche">Boliche</label> <input type="text" name="boliche" id="boliche" value="<?=$bolicheTrago?>" class="form-control"><?=$errorBoliche?></br>
							
				
							<input type="submit" name="ok" value="Aceptar" id="button" class="btn btn-default">
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
}
?>
