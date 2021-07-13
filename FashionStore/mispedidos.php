<?php
require_once( "egcc.php" );
fnSessionStart();
$id= $_SESSION["codigo"];
if($_SESSION["codigo"]){
	$k = 1; // Con bot�n Comprar
} else {
	$k = 0; // Sin bot�n Comprar
}
$cn = fnConnect($msg);
if(!$cn) {
	fnShowMsg("Error",$msg);
	return;
} else {
	$rs = mysql_query("select * from cliente inner join pedido on cliente.idcliente=pedido.idcliente
inner join detalle on pedido.idpedido=detalle.idpedido
inner join articulo on articulo.idarticulo=detalle.idarticulo
where pedido.idcliente = '$id' ",$cn);
        say("<div id='lista2'>");
	say("<table width=auto border=2>");
	say("<tr>");
	say("<th width=90 align=center valign=middle>Idpedido</th>");
	say("<th width=90 align=center valign=middle>Fecha</th>");
        say("<th width=90 align=center valign=middle>Estado</th>");
        say("<th width=90 align=center valign=middle>Nombre</th>");
        say("<th width=90 align=center valign=middle>Cantidad</th>");
        say("<th width=90 align=center valign=middle>Subtotal</th>");
	say("</tr>");
	$col = 1;
	while($row = mysql_fetch_array($rs,MYSQL_ASSOC)) {
		if($col==1){say("<tr>");}
		say("<th>".$row["idpedido"]."</th>");
		say("<th>".$row["fecha"]."</th>");
		say("<th>".$row["estado"]."</th>");
                say("<th>".$row["nomarticulo"]."</th>");
                  say("<th>".$row["cantidad"]."</th>");
                 say("<th>".$row["subtotal"]."</th>");
		$codigo = $row["idarticulo"];
		if($k){
			
		}
		
		
	}
	if($col==1){say("</tr>");}
	say("</table>");say("</div>");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <title>ecuaboton</title>
         
    </head>
    <body>
         <div>
             <img id="imagen1" src="banner/banner2ecuaboton.jpg" alt="principal"></img>
         </div >
<?php
say("<div id=cli>");
fnHeader();
say("</di>");
?>
        <hr>
        <div class="vis">
            <h4>Quienes somos</h4>
            <p>Somos una empresa con mucha responsabilidad que brinda sus servicios desde el año 2000 hasta la actualidad 
               brindando a sus clientes productos elaborados en tagua.</p>
            <h4>Misión</h4>
            <p>Elaborar productos de tagua de la alta calidad para un mercado 
               exigente y competitivo con eficiencia y responsabilidad.</p>
            <h4>Visión </h4>
            <p>Ser una empresa líder en el mercado nacional e internacional con productos elaborados de tagua.</p>
        
        </div>
        
        <div id="menu">
            <ul>
                <li><a href="default.php">Inicio</a></li>
                <li><a href="modusua.php">Modificar mis Datos</a></li>
                <li><a href="mispedidos.php">Mis Pedidos</a></li>
                <li><a href="default.php?op=2">Catàlogo</a></li>
                <li><a href="cerrar.php">Cerrar Sesiòn</a></li>
                
            </ul>
            </div>
        
<?php
$op = 0;
if(isset($_GET["op"]) ) {
	$op = $_GET["op"];
}
switch ($op) {
	case 1:
		require( "default.php" );
		break;
	case 2:
		require( "catalogo.php" );
		break;
	case 3:
		require( "canasta_list.php" );
		break;
	case 4:
		require( "pagar.php" );
		break;
	case 5:
		require( "canasta_edit.php" );
		break;
	case 6:
		require( "pagar_conf.php" );
		break;
	case 10:
		require( "error.php" );
		break;
            
}
?>  
    </body>
</html>