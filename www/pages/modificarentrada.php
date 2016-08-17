
<?php
		$evn=file_get_contents("jsonEntradas.json","r");
		$evento=json_decode($evn,true);	
		
if(isset($_GET["idEntrada"])){
		
		$errores=0;
		$errorBoliche="";
		$errorPrecio="";
		$errorDiaHora="";
		$errorFecha = "";
		$errorTotal="";
		$errorVendidas="";
		$errorReservadas="";
		$idEntradaa=$_GET["idEntrada"]-1;
		$idEntra= $evento[$idEntradaa]["idEntrada"];
		$nombreBoli= $evento[$idEntradaa]["boliche"];
		$precioEntra= $evento[$idEntradaa]["precio"];
		$fechavto= $evento[$idEntradaa]["fecha"];
		$diayhora= $evento[$idEntradaa]["diahora"];	
		$totalEntra= $evento[$idEntradaa]["total"];
		$vendidasEntra= $evento[$idEntradaa]["vendidas"];
		$reservadasEntra= $evento[$idEntradaa]["reservadas"];
			
		if (isset($_POST) && count($_POST)>0)
		{	
			$evento[$idEntradaa]["idEntrada"]=$evento[count($evento)-1]["idEntrada"];
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
					$evento[$idEntradaa]["boliche"]=$_POST["boliche"];
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
					$evento[$idEntradaa]["precio"]=$_POST["precio"];
				}
			}
			
			if (!isset($_POST["fecha"]))
			{
				$errorFecha="No completo la fecha de vto";
				$errores=1;
			}
			else
			{
				
				if ($_POST["fecha"]=="")
				{
					$errorFecha="La fecha de vto no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$evento[$idEntradaa]["fecha"]=$_POST["fecha"];
				}
			}
			
			if (!isset($_POST["diahora"]))
			{
				$errorDiaHora="No completo el dia/hora";
				$errores=1;
			}
			else
			{
				
				if ($_POST["diahora"]=="")
				{
					$errorDiaHora="El dia/hora no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$evento[$idEntradaa]["diahora"]=$_POST["diahora"];
				}
			}
			
			if (!isset($_POST["total"]))
			{
				$errorTotal="No completo el total";
				$errores=1;
			}
			else
			{
				
				if ($_POST["total"]=="")
				{
					$errorTotal="El total no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$evento[$idEntradaa]["total"]=$_POST["total"];
				}
			}
			if (!isset($_POST["vendidas"]))
			{
				$errorVendidas="No completo las entradas vendidas";
				$errores=1;
			}
			else
			{
				
				if ($_POST["vendidas"]=="")
				{
					$errorVendidas="Las entradas vendidas no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$evento[$idEntradaa]["vendidas"]=$_POST["vendidas"];
				}
			}
			if (!isset($_POST["reservadas"]))
			{
				$errorReservadas="No completo las entradas reservadas";
				$errores=1;
			}
			else
			{
				
				if ($_POST["reservadas"]=="")
				{
					$errorEdad="Las entradas reservadas no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$evento[$idEntradaa]["reservadas"]=$_POST["reservadas"];
				}
			}
		
		
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$bolis = json_encode($evento,true);
			file_put_contents("jsonEntradas.json",$bolis);
			
			header("Location: abmentradas.php");
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
                    <h1 class="page-header">Modificar Entrada</h1>
                </div>
             </div>
			 
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Modifica los datos de la entrada
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">	
		<center>

			<form id="form" action='modificarentrada.php?idEntrada=<?=$_GET["idEntrada"]?>' method="POST">
							<label for= "boliche">Boliche</label> <input  type="text" name="boliche" id="boliche" value="<?=$nombreBoli?>" class="form-control"> <?=$errorBoliche?>
							<label for= "precio">Precio</label> <input type="text" name="precio" id="precio" value="<?=$precioEntra?>" class="form-control"><?=$errorPrecio?>
							<label for= "fecha">Fecha vto</label> <input type="text" name="fecha" id="fecha" value="<?=$fechavto?>" class="form-control"><?=$errorFecha?>
							<label for= "diahora">Dia y Hora</label> <input type="text" name="diahora" id="diahora" value="<?=$diayhora?>" class="form-control"><?=$errorDiaHora?>
							<label for= "total">Total</label> <input type="text" name= "total" id="total" value="<?=$totalEntra?>" class="form-control"><?=$errorTotal?>
							
					<div class="luli"></div>
							<input type="submit" name="ok" value="Aceptar" id="button" class="btn btn-default">
						</form>
					<button type="submit" name="button" onclick="window.location.href='http://localhost/pages/abmentradas.php'" class="btn btn-default"/>Cancelar</button>
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
