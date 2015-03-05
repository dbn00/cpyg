<?php
//require_once('accesoseguro.php');
require_once("cnxbd.php");

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
    <div class="testbox">
  <h1>Modificacion de Clientes</h1>

<?php
if(isset($_POST['enviar'])){
  require_once("modifUP.php");
}elseif(isset($_GET['id'])){
  $sqlG="SELECT * FROM razas ORDER BY idRaza ASC";
  $resG=mysql_query($sqlG,$idcon) or die ('error genero');
  
  
  $id=$_GET['id'];
  $sql="SELECT * FROM clientes WHERE idCliente=$id";
  $result=mysql_query($sql,$idcon) or die ('seleccion');
  $fila=mysql_fetch_assoc($result);


  echo' 
  <form action="modificar.php" method="post" enctype="multipart/form-data" name="modiClientes" id="modiClientes">

  <input type="hidden" name="id" id="id" value="'.$_GET['id'].'" />
  <input type="text" name="nombre" id="nombre" placeholder="Nombre de Cliente" value="'.stripslashes($fila['nombre']).'" />
  <input type="text" name="mascota" id="mascota" placeholder="Nombre de la Mascota" value="'.stripslashes($fila['mascota']).'"/>
  <select name="raza" id="raza">
          <option value="">Seleccione</option>';
        
      while($filasG=mysql_fetch_assoc($resG)){
        
          if($fila['idRaza'] == $filasG['idRaza']){ 
          
          $sG=' selected="selected"';
      }
        
        echo'<option value="'.$filasG['idRaza'].'"'.$sG.'>'.$filasG['raza'].'</option>';
      unset($sG);
      }
     echo '
        </select>
  <input type="text" name="email" id="email"  placeholder="Email" value="'. stripslashes($fila['email']).'" />
  <input type="text" name="telefono" id="telefono" placeholder="Telefono" value="'. stripslashes($fila['telefono']).'" />
  <textarea rows="5" cols="20" name="comentarios" placeholder="Comentarios" id="comentarios">'. stripslashes($fila['comentarios']).'</textarea>
 <input type="submit" name="enviar" id="enviar" value="Modificar" class="button">

  </form>
';
  
}
?>

</div>
      
    </div>
  </div><!--FIN CUERPO-->
</body>
</html>