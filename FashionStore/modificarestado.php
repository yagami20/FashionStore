<?php
include_once ( 'ClasePedido.php' );
function main()
{
$errores=array();
if(isset($_POST['guardar']))
{
$cod=  $_POST ['codigo'];
$estado=$_POST ['estado'];

$U = new Pedido ();
$U ->setidpedido($cod);
$U ->setestado($estado);

 if(!$errores){
    if( $U->modificarestado()){
 echo ("<script> alert('Registro Modificado'); location.href = 'principaladministrador.php';</script>");
} else {
echo ("<scrip> alert('Error, no se puede Modificar'); location.href = 'principaladministrador.php';</scrip>");
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
              <li><a href="cerrar.php">Cerrar Sesiòn</a></li>
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

        <h2>Estado de Producto</h2>
<br>
	
                <form method="POST" action="modificarestado.php">
	<center>CODIGO PEDIDO: <input type="text" name="codigo" size="1" required><br><br>
                        ESTADO DE PRODUCTO:<select name="estado">
                    <option value="#"></option>
                    <option value="Entregado">Entregado</option>
                        </select>
			<br><br><br>
			<input type="submit" value="Modificar" id="guardar" name="guardar"></center>
			</form>
	</div
</body>
</html>
<?php
}
}
main();
