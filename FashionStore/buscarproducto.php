<?php
include_once ( 'ClaseProducto.php' );
//Nueva instancia de la clase
if (isset($_POST["BUSCAR"]))
{
$R = new Producto ();
$id=$_POST["id"];
$registro=$R->buscar_id($id);
if (mysql_num_rows($registro)!=0)
	{
		while($fila=mysql_fetch_object($registro))
		{
		$idarticulo=$fila->idarticulo;
                $nomarticulo=$fila->nomarticulo;
                $precio=$fila->precio; 
                $stock=$fila->stock;
                $color=$fila->color;
              
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <link type="text/css" rel="stylesheet" href="administrador.css"/>
        <title>Modificar Producto</title>
    </head>
    <body> 
        <div>
             <img id="imagen1" src="banner/banner2ecuaboton.jpg" alt="principal"></img>
         </div >
        <hr>
         
         <div id="header">
        <ul class="menu">
            <li> <a href="principaladministrador.php" >Inicio</a>
            <ul>
                <li><a href="cerrar.php">Cerrar Sesiòn</a></li>
            </ul>
            <li> <a href="principaladministrador.php">Cliente</a>
        <ul>
            <li> <a href="ingresoclieadmi.php">Ingreso</a></li>
            <li> <a href="reporteclienntemodi.php">Modificar</a></li>
           
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
<form method="POST" action="modificarpro.php" enctype="multipart/form-data">

        CODIGO : &nbsp;&nbsp;&nbsp;<input name="cod" type="text" size="20" value="<?php echo $idarticulo?>"><br><br>
	 NOMBRE: &nbsp;&nbsp;&nbsp;<input name="nom" type="text" size="20" value="<?php echo $nomarticulo?>"><br><br>
         PRECIO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="pre" type="text" size="20" value="<?php echo $precio?>"><br><br>
         STOCK:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="est" type="text" size="20" value="<?php echo $stock?>"><br><br>
         COLOR: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="color">
                <option value="Amarillo">Amarillo</option>
                <option value="Azul">Azul</option> 
                <option value="Verde">Verde</option> 
                 <option value="Rojo">Rojo</option> 
                </select>  <br><br>         
         MEDIDA:&nbsp;&nbsp;&nbsp;<select name="medida">
                <option value="S/M">S/M</option>
                <option value="10mm">10mm</option> 
                <option value="15mm">15mm</option> 
                <option value="20mm">20mm</option> 
                </select>  <br>  <br>    
         
	<input name="Guardar" type="submit" id="guardar" value="Guardar">
   
        </form>
           
           

            </div>
             <div id="footer">
                <p>Dirección: Nápoles E6-50 y Santa Catalina Barrio Rojas Cumbayá </p>
                <p>Telefax:(593-2)2895-022    Cel:098321076     Email:ecuaboton@yahoo.es </p>
                <p>Quito-Ecuador</p>
 </div>
        
    </body>
</html>
	<?php
	
	}
 	}
	else
	{
		echo ("<script> alert('El id ingresado no existe'); location.href ='ModProdBus.php';</script>");   
	}

}
else
{
    ?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <link type="text/css" rel="stylesheet" href="administrador.css"/>
        <title>Ingreso Usuario</title>
    </head>
    <body> 
        <div>
             <img id="imagen1" src="banner/banner2ecuaboton.jpg" alt="principal"></img>
         </div >
        <hr>
         
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
            <li> <a href="reportepromodi.php">Modificar</a></li>
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
        <h2>Buscar Producto</h2><br>
            <form method="POST" action="buscarproducto.php">
			<center>Código: <input type="text" name="id"  required><br><br>
			<br>
			<input type="submit" value="BUSCAR" id="BUSCAR" name="BUSCAR"></center>
			</form>
             </div>
</body>
</body>
</html>

<?php 
}
?>

