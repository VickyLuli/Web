
<?php
		$even=file_get_contents("jsonEntradas.json","r");
		$evento=json_decode($even,true);	

		$errores=0;
		$errorBoliche="";
		$errorPrecio="";
		$errorDiaHora="";
		$errorFecha = "";
		$errorTotal="";
		$errorVendidas="";
		$errorReservadas="";
	
			
		if (isset($_POST) && count($_POST)>0)
		{
			$indice=count($evento);
			$evento[$indice]["idEntrada"]=$evento[count($evento)-1]["idEntrada"]+1;
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
					$evento[$indice]["boliche"]=$_POST["boliche"];
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
					$evento[$indice]["precio"]=$_POST["precio"];
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
					$evento[$indice]["fecha"]=$_POST["fecha"];
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
					$evento[$indice]["diahora"]=$_POST["diahora"];
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
					$evento[$indice]["total"]=$_POST["total"];
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
					$errorVendidas="Las entradas vendidas no puede ser vacio";
					$errores=1;
					
				}
				else
				{
					$evento[$indice]["vendidas"]=$_POST["vendidas"];
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
					$errorReservadas="Las entradas reservadas no puede ser vacia";
					$errores=1;
					
				}
				else
				{
					$evento[$indice]["reservadas"]=$_POST["reservadas"];
				}
			}
		
		
		}
		else{
			$errores=1;
		}
		if ($errores==0)
		{
			$evnt = json_encode($evento,true);
			file_put_contents("jsonEntradas.json",$evnt);
			header("Location: abmEntradas.php");
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
                    <h1 class="page-header">Agregar Entradas</h1>
                </div>
             </div>
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default3">
							<div class="panel-heading">
							<center>

								Agrega una entrada
								</center>

							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
					<center>

					<form id="form" action="agregarentrada.php" method="POST">
							<input placeholder="Boliche" type="text" name="boliche" id="boliche" class="form-control"><?=$errorBoliche?><div class="lule"></div>
							<input placeholder="Precio" type="text" name="precio" id="precio" class="form-control"><?=$errorPrecio?><div class="lule"></div>
							<input placeholder="Fecha vto" type="text" name="fecha" id="fecha" class="form-control"><?=$errorFecha?><div class="lule"></div>
							<input placeholder="Dia y Hora" type="text" name="diahora" id="diahora" class="form-control"><?=$errorDiaHora?><div class="lule"></div>
							<input placeholder="Total" type="text" name= "total" id="total" class="form-control"><?=$errorTotal?><div class="lule"></div>
							
							<div class="lule"></div>
							<input type="submit" name="ok" value="Aceptar" id="button" href="agregarentrada.php" class="btn btn-default">
					</form>
						<button type="submit" name="button" onclick="window.location.href='abmentradas.php'" class="btn btn-default"/>Cancelar</button>
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