<?php
require_once( "egcc.php" );
fnSessionStart();
if( !isset($_POST["seguro"]) ) {
	fnRedirect( "default.php" );
	return;
}
$seguro = $_POST["seguro"];
if( $seguro != $_SESSION["seguro"] ){
	fnRedirect( "default.php?op=2" );
	return;
}
$codigo = $_POST["codigo"];
$canasta = $_SESSION["canasta"];
if( is_null($canasta) ) {
	$canasta[$codigo] = 1;
} else {
	$encontro = 0;
	foreach ( $canasta as $item => $valor ) {
		if( $item == $codigo ) {
			$canasta[$codigo] += 1;
			$encontro = 1;
			break;
		}
	}
	if( $encontro == 0 ) { $canasta[$codigo] = 1; }
}
$_SESSION["canasta"] = $canasta;
fnRedirect( "default.php?op=3" );
?>

