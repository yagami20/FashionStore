<?php
session_start();
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['id']!=$_POST['Id']){
			$datosNuevos[]=array(
				'id'=>$arreglo[$i]['id'],
				'nombre'=>$arreglo[$i]['nombre'],
				'precio'=>$arreglo[$i]['precio'],
				'cantidad'=>$arreglo[$i]['cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
		//header ("Location:carrito.php");
	}else{
		unset($_SESSION['carrito']);
		echo '0';
	}
?>