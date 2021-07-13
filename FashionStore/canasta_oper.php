<?php
require("egcc.php");
fnSessionStart();
if( !$_SESSION["codigo"] ) {
	fnRedirect( "default.php" );
	return;
}
if( !isset($_GET["oper"]) ) {
	fnRedirect( "default.php" );
	return;
}
$oper = $_GET["oper"];
$art  = $_GET["art"];
$canasta = $_SESSION["canasta"];
if($oper=="T"){ // Eliminar todos los items
	$canasta = null;
}
if($oper=="A"){ // Eliminar item actual
	$canasta_tmp = null;
	foreach ($canasta as $item => $valor) {
		if( $item != $art ) { 
			$canasta_tmp[$item] = $valor; 
		}
	}
	$canasta = $canasta_tmp;
}
$_SESSION["canasta"] = $canasta;
fnRedirect( "default.php?op=3" );
?>