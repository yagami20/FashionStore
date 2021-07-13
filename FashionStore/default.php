<?php
require_once( "egcc.php" );
fnSessionStart();
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


