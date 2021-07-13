<?php
require_once( "egcc.php" );
fnSessionStart();
$email = $_POST["usuario"];
$clave = $_POST["clave"];
$cn = fnConnect($msg);
$sql = "select cedula, nombre from administrador ";
$sql .= "where cedula = '$email' and clave = '$clave'";
$rs = mysql_query($sql,$cn);
$rows = mysql_num_rows( $rs );
if( $rows == 0 ){
	echo ("<script> alert('La contraseña o Correo son incorrectos'); location.href = 'ingresodministrador.php';</script>");
	return;
}
$_SESSION["codigo"] = mysql_result($rs,0,0);
$_SESSION["nombre"] = mysql_result($rs,0,1);
fnRedirect( "principaladministrador.php" );
?>

