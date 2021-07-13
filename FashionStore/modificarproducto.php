<?php
include 'ClaseProducto.php';
function main()
{
$errores=array();
if(isset($_POST['Guardar']))
{
        $cod=$_POST ['cod' ];
	$nombre=$_POST ['nom' ];
        $color= $_POST ['color' ];
        $med= $_POST ['media' ];
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
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) 
	{ 
		$origen = $_FILES['imagen']['tmp_name'];
		$destino = 'fotos/'.$_FILES['imagen']['name'];
		copy($origen, $destino);
		$subio = true; 
	}
	else{
		$subio=false;
	}

	if($subio) 
	{ 
		$name = $_FILES["imagen"]["name"];
		$tmp = $_FILES["imagen"]["tmp_name"];
		$tama = $_FILES["imagen"]["size"];
                
		$U ->setimagen($name);
	} 
	else 
	{ 
	$errores[] = 'Error no se pudo subir la imagen, recuerde insertar una imagen';
	}
	
	if(!$errores)
	{
	 if ( $U->modificar())
	 {
	   	 echo  ("<script> alert('Producto Modifcado'); location.href = 'principaladministrador.php';</script>");
		}
	 else
	 {
		 echo  ("<scrip> alert('Error, no en se puede modificar el producto'); location.href = 'principaladministrador.php';</scrip>");  
		}
   }
   else{
			$errorya=$errores[0];
		    echo ("<script> alert('$errorya'); location.href = 'javascript:history.go(-1)';</script>");
   }
}
else
{
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         
        <link type="text/css" rel="stylesheet" href="administrador.css"/>
        <title>Administrador</title>
    </head>
    <body> 
        <div>
             <img id="imagen1" src="banner/banner2ecuaboton.jpg" alt="principal"></img>
         </div >
        <div id="header">
        <ul class="menu">
            <li> <a href="principaladministrador.php" >Inicio</a>
            <ul>
                <li> <a href="cerrar.php">Cerrar sesion </a></li>
            </ul>
            <li> <a href="principaladministrador.php">Cliente</a>
        <ul>
            <li> <a href="ingresoclieadmi.php">Ingreso</a></li>
            <li> <a href="buscarcliente.php">Modificar</a></li>
           
        </ul> 
        </li>
        <li> <a href="ingresoclieadmi.php" >Producto</a>
    	<ul>
            <li> <a href="ingresopro.php">Ingreso</a></li>
            <li> <a href="buscarproducto.php">Modificar</a></li>
             <li> <a href="modificarestado.php">Entregados</a></li>
        </ul> 
          <li> <a href="aingresoclieadmi.php" >Reportes</a>
    	<ul>
            <li> <a href="reporteclientes.php">Clientes</a></li>
            <li> <a href="reportepro.php">Productos</a></li>
            <li> <a href="reportepedido.php">Pedidos</a></li>
            <li> <a href="reportepedidosentre.php">Pedidos Entregados</a></li>
        </ul> 
    </li>
</ul>
  </div> 
         <div class="in">

        <h2>Modificar Producto</h2>
<br>
<form method="POST" action="modificarproducto.php" enctype="multipart/form-data">

        CODIGO : &nbsp;&nbsp;&nbsp;<input name="cod" type="text" size="20" ><br><br>
	 NOMBRE: &nbsp;&nbsp;&nbsp;<input name="nom" type="text" size="20" ><br><br>
         COLOR: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="color" type="text" size="20" ><br><br>
         MEDIDA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="media" type="text" size="20" ><br><br>
         PRECIO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="pre" type="text" size="20" ><br><br>
         STOCK:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="est" type="text" size="20" ><br><br>
         IMAGEN: <input name="imagen" type="file" id="archivo"><br><br>
	<input name="Guardar" type="submit" id="guardar" value="Guardar">
   
        </form>
           

            </div>
         
        
    </body>
</html>
<?php
}
}
main();
?>


