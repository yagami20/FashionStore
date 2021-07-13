<?php
require_once( "egcc.php" );
include 'ValidacionPro.php';
if( !$_SESSION["codigo"] ) {
	fnRedirect( "default.php" );
	return;
}
if( !isset($_GET["art"]) ) {
	fnRedirect( "default.php" );
	return;
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <title>ecuaboton</title>
 <?php
$canasta = $_SESSION["canasta"];
$codigo = $_GET["art"];
$cant = $canasta[$codigo];
$cn = fnConnect( $msg );
$sql = "select * from articulo ";
$sql .= "where idarticulo = '$codigo'";
$rs = mysql_query($sql,$cn);
$row = mysql_fetch_assoc( $rs );
say("<div id='lista2'>");
say("<table width=500 align='center' border='2'>");
say("<tr>");
say("<td width=500 align='center' valign='middle'>");
say("<img src='fotos/$codigo.png' width='100' height='100' border='1'>");
say("</td>");
say("<td width=380 align='center' valign='middle'>");
say("Còdigo: $codigo<br>");
say("Nombre: ".$row["nomarticulo"]."<br>");
say("Color: ".$row["color"]."<br>");
say("Medida: ".$row["medida"]."<br>");
say("Precio: ".$row["precio"]."<br>");;
say("Stock: ".$row["stock"]."<br>");
say("<form method='post' action='canasta_update.php'>");
say("<input type='hidden' name='art' value='$codigo'>");
say("Cantidad:");
say("<input type='number' min='1' name='cant' size=5 maxlength=1 value='$cant'><br>");
say("<input type='hidden' name='seguro' value='".$_SESSION["seguro"]."'>");
say("<input type='submit' value='Aceptar'> ");
say("<input type='submit' value='Cancelar' onClick='history.back();'>");
say("</form>");
say("</td>");
say("</tr>");
say("</table>");
say("</div>");

?>
        </body>
</html>