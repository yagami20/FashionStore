<?php
include 'ClaseProducto.php';
include 'ValidacionPro.php';
function main()
{
$errores=array();
if(isset($_POST['Guardar']))
{
        $cod=$_POST ['cod' ];
	$nombre=$_POST ['nom' ];
        $color= $_POST ['color' ];
        $med= $_POST ['medida' ];
        $pre= $_POST ['pre' ];
        $est= $_POST ['est' ];
      
	$U = new Producto();

	 $U ->setidarticulo($cod);	
  
	 $U ->setnomarticulo($nombre); 	 
	
       
if(!ValidatePrecio($pre)){
$errores[] = 'El precio no pude tener letras, ni estar en blanco';
} else{
	$U ->setprecio($pre);	
}
$U ->setcolor($color);
$U ->setmedida($med);
if(!ValidateCantidad($est)){
	$errores[] = 'La cantidad debe ser mayor a cero';
} else{
$U ->setstock($est);
}
		if(!$errores)
	{
	 if ( $U->modificar())
	 {
	   	 echo  ("<script> alert('Producto Modificado'); location.href = 'principaladministrador.php';</script>");
		}
	 else
	 {
		 echo  ("<scrip> alert('Error, no en se puede modificar'); location.href = 'principaladministrador.php';</scrip>");  
		}
   }
   else{
			$errorya=$errores[0];
		    echo ("<script> alert('$errorya'); location.href = 'javascript:history.go(-1)';</script>");
   }
}
}
main();
?>
