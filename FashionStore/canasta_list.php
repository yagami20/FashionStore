<?php
require_once( "egcc.php" );
$canasta = $_SESSION["canasta"];
if( is_null( $canasta ) ) {
	say("<div id='lista12'>");fnShowMsg( "Mensaje", "Su canasta esta vacia." );say("</div>");
	return;
}
ksort( $canasta );
$cn = fnConnect( $msg );
if(!$cn){
	fnShowMsg( "ERROR", $msg );
	return;
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <title>ecuaboton</title>

<?php
say("<div id='lista'>");
say("<table width='600' align='center' border='2'>");
say("<tr height=25>");
say("<th width=30 align=center valign=middle>Còdigo</th>");
say("<th width=150 align=center valign=middle>Nombre</th>");
say("<th width=150 align=center valign=middle>Color</th>");
say("<th width=70 align=center valign=middle>Cantidad</th>");
say("<th width=70 align=center valign=middle>Precio</th>");
say("<th width=70 align=center valign=middle>Subtotal</th>");
say("<th align=center valign=middle>Anular</th>");
say("<th align=center valign=middle>Agregar Cantidad</th>");
say("</tr>");
$total = 0;
foreach ( $canasta as $item => $valor ) {
	$sql = "select idarticulo as art, nomarticulo as nom,";
	$sql .= "precio as precio, color as col ";
	$sql .= "from articulo as a ";
	$sql .= "where idarticulo = '$item' ";
	$rs = mysql_query( $sql, $cn );
	$row = mysql_fetch_assoc( $rs );
	$subtotal = $row["precio"] * $valor;
	$total += $subtotal;
	say("<tr>");
	say("<td align=center>".$row["art"]."</td>");
	say("<td align=left>".$row["nom"]."</td>");
        say("<td align=left>".$row["col"]."</td>");
	say("<td align=center>".$valor."</td>");
	say("<td align=right>".$row["precio"]."</td>");
	say("<td align=right>".$subtotal."</td>");
	say("<td align=center>");
	$cad = "canasta_oper.php?oper=A&art=".$row["art"];
	say( fnLink($cad,"","Anular Item","Anular") );
        say("</td>");
        say("<td align=center>");
	$cad = "default.php?op=5&art=".$row["art"];
	say( fnLink($cad,"","Editar Item","Editar") );
	
	say("</td>");
	say("</tr>");
}
say("<tr height=25>");
say("<th align=left valign=middle colspan=5>Total</th>");
say("<th align=right valign=middle>$total</th>");

say("<tr>");
say("<th colspan=2>");
say(fnLink("default.php?op=2","","Seguir Comprando","Seguir Comprando"));
say("</th>");
say("<th colspan=3>");
say(fnLink("canasta_oper.php?oper=T","","Vaciar Canasta","Vaciar Canasta"));
say("</th>");
say("<th colspan=3>");
say(fnLink("default.php?op=4","","Pagar","Pagar"));
say("</th>");

say("</tr>");
say("</table>");
say("</div>");
?>
        </body>
</html>