<?php
//require_once('accesoseguro.php');
require_once('cnxBD.php');
$sql="SELECT idCliente,nombre,mascota FROM clientes ORDER BY idCliente ASC";
$resultT=mysql_query($sql,$idcon) or die(mysql_error()); 

$clientesXpagina=10; 
$numClientes=mysql_num_rows($resultT);
$numPags= ceil($numClientes/$clientesXpagina); 
if(isset($_GET['pag'])){
	$pagActual=$_GET['pag'];
}else{
	$pagActual=1; 
}

$inicio=($pagActual*$clientesXpagina)-$clientesXpagina; // pag actual menos 1 multiplicado por peliculas por pagina $inicio=($pagActual - 1) * $clientesXpagina
$sqlP="SELECT idCliente,nombre,mascota FROM clientes ORDER BY idCliente ASC LIMIT $inicio, $clientesXpagina"; // limit limita desde $inicio, X peliculas por pagina
$result=mysql_query($sqlP,$idcon) or die (mysql_error());


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine:600,700,900" media="all">
	<link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
	<?php include ('cabeceraAdmin.html');?>
		<!--FIN MENU-->
	<div id="cuerpo">
		<div id="contenidoCuerpo">
		
<div class="testboxMB">
  <h1>Listado de Clientes</h1>

  	<table id="tablaMB">
  <tr>
    <td><h2>Cliente</h2></td>
    <td><h2>Mascota</h2></td>
    <td></td>
    <td></td>
  </tr>
  <?php 
  $color='#FFFFFF';
  while($filas=mysql_fetch_assoc($result)){
  	if($color=='#FFFFFF'){
		$color='#cccccc';
	}else{
		$color='#FFFFFF';
  }
  echo '<tr bgcolor="'.$color.'">
    <td>'.$filas['nombre'].'</td>
    <td>'.$filas['mascota'].'</td>
    <td><a href="modificar.php?id='.$filas['idCliente'].'"> Modificar</a></td>
    <td><a href="borrar.php?id='.$filas['idCliente'].'">Borrar</a></td> 
  </tr>';
  }
  
  ?>
  <tr>
    <td ></td>
  </tr>
</table>

<div id="pieMB"><!--pie -->

<div id="centrado">
	<?php 
	//anterior
	if($pagActual > 1){ 
		echo '<a  class="pieButton" href="modificarborrar.php?pag='.($pagActual-1).'">Anterior&lt;&lt;&lt;  </a>';
	}
	
	?>
	
<div class="pieButton2">
	<?php 

	
	for($i=1;$i<=$numPags;$i++){
		if($i == $pagActual){
			echo "  $i  "; 
		}else{
			echo'<a href="modificarborrar.php?pag='.$i.'">'.$i.'</a>';
		}
	
	}

	?>
</div>
	<?php
	
	//Siguiente
	if($pagActual < $numPags){ 
		echo '<a class="pieButton" href="modificarborrar.php?pag='.($pagActual+1).'">Siguiente&gt;&gt;&gt;  </a>';
	}
	
	
	?>
</div>



</div> <!--pie -->

		</div>
	</div><!--FIN CUERPO-->
</body>
</html>