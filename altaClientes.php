<?php
/*require_once('accesoseguro.php');*/
require_once('cnxBD.php');
	$msg=" ";

	if(isset($_POST['enviar'])){
			
			$nombre = $_POST['txtCliente'];
			$mascota = $_POST['txtMascota'];
			$raza = $_POST['despRaza'];
			$email = $_POST['txtEmail'];
			$tel = $_POST['txtTelefono'];
			$comentarios = $_POST['txtComentarios'];



			$sql="INSERT INTO clientes (nombre,mascota,raza,email,telefono,comentarios) 
			VALUES ('$nombre','$mascota','$raza','$email','$tel','$comentarios')"; 


			if(mysql_query($sql)){ 
				$msg="Cliente Insertado";
			}else{
				$msg="Error en la insercion de Cliente";
			}
	}
	
$sqlRaza="SELECT * FROM razas ORDER BY raza ASC";
$result=mysql_query($sqlRaza);


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
	
	<div id="cuerpo">
		<div id="contenidoCuerpo">
			<div class="testbox">
  <h1>Alta de Clientes</h1>

  <form action="altaClientes.php" method="post" enctype="multipart/form-data" name="altaClientes" id="altaClientes">

  <input type="text" name="txtCliente" id="txtCliente" placeholder="Nombre de Cliente" />
  <input type="text" name="txtMascota" id="txtMascota" placeholder="Nombre de la Mascota"/><br/>
  <select name="despRaza" id="despRaza">
        <?php 
		
		while($filas=mysql_fetch_assoc($result)){
			echo '<option value="'.$filas['idRaza'].'">'.$filas['raza'].'</option>';				
		}
		?>
  </select><br/>
  <input type="text" name="txtEmail" id="txtEmail" placeholder="Email"/>
  <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Telefono"/> 
  <textarea rows="5" cols="20" name="txtComentarios" id="txtComentarios" placeholder="Comentarios"></textarea>

  	<p><?php echo $msg;?></p>
   

   <input type="submit" name="enviar" id="enviar" value="Registrar" class="button">

  </form>
</div>	

		</div>
	</div><!--FIN CUERPO-->
</body>
</html>