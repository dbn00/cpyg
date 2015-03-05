
<?php
//require_once('accesoseguro.php');
//recogemos los datos del form
if(get_magic_quotes_gpc()){ // esta linea la ponemos para comprobar lo que viene con comillas magicas escapadas,
	$nombre=$_POST['nombre'];
	$mascota=$_POST['mascota'];
	$raza=$_POST['raza'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	$comentarios=$_POST['comentarios'];
	$idCliente=$_POST['id'];
}else{ // y por si acaso alguna no viene escapada las escapamos con mysql_real_escape_string
	$nombre=mysql_real_escape_string($_POST['nombre']);
	$mascota=mysql_real_escape_string($_POST['mascota']);
	$raza=mysql_real_escape_string($_POST['raza']);
	$email=$_POST['email'];
	$telefono=mysql_real_escape_string($_POST['telefono']);
	$comentarios=mysql_real_escape_string($_POST['comentarios']);
	$idCliente=$_POST['id'];
}


$fecha=time();

$sqlUpdate="UPDATE clientes SET nombre='$nombre', mascota='$mascota', raza='$raza', email='$email',telefono='$telefono', comentarios='$comentarios' WHERE idCliente=$idCliente";
mysql_query($sqlUpdate,$idcon) or die (mysql_error());//('UPDATE');
$msg="Cliente $nombre";
$msg2="Mascota $mascota";


echo ' <div id="modificado">
    <h1>'.$msg.' <br/> '.$msg2.'<br/> actualizado correctamente </h1><br/>
  </div>
'
?> 