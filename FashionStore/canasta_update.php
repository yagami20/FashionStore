<?php
require_once( "egcc.php" );
fnSessionStart();
if( !$_SESSION["codigo"] ) {
	fnRedirect( "default.php" );
	return;
}
if( !isset($_POST["seguro"]) ) {
	fnRedirect( "default.php" );
	return;
}
$codigo = $_POST["art"];
$cant   = $_POST["cant"];
$_SESSION["canasta"][$codigo] = $cant;
fnRedirect( "default.php?op=3" );
?>