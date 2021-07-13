<?php
include_once ( 'ClaseUsuario.php' );
//Nueva instancia de la clase
if (isset($_POST["BUSCAR"]))
{
$R = new Usuario ();
$id=$_POST["id"];
$registro=$R->buscar_num_cedula($id);
if (mysql_num_rows($registro)!=0)
	{
		while($fila=mysql_fetch_object($registro))
		{
		$idcliente=$fila->idcliente;
		$clave=$fila->clave;
                $nomcliente=$fila->nomcliente;
                $apecliente=$fila->apecliente; 
                $paiscliente=$fila->paiscliente; 
                $ciucliente=$fila->ciucliente; 
                $dircliente=$fila->dircliente; 
                $email=$fila->email; 
                $telefono=$fila->telefono; 
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

        <h2>Modificar Usuario</h2>
<br>
<form method="POST" action="modificarcliente.php">
    CEDULA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="cedula" type="text" size="20" value="<?php echo $idcliente?>"><br><br>
CONTRASEÑA: <input name="clave" type="password" size="20" value="<?php echo $clave?>"><br><br>
NOMBRE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="nombre" type="text" size="20" value="<?php echo $nomcliente?>" ><br><br>
APELLIDO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="apellido" type="text" size="20" value="<?php echo $apecliente?>"><br><br>
PAIS:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="pais" type="text" size="20" value="<?php echo $paiscliente?>"><br><br>
CIUDAD: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="ciudad" type="text" size="20" value="<?php echo $ciucliente?>"><br><br>
DIRECCION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="direccion" type="text" size="20" value="<?php echo $dircliente?>"><br><br>
CORREO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="correo" type="text" size="20" value="<?php echo $email?>"><br><br>
TELEFONO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="telefono" type="tel" size="20" value="<?php echo $telefono?>"><br><br>
<input name="guardar" type="submit" value="guardar" id="guardar">
   
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
            <li> <a href="reporteclienntemodi.php">Modificar</a></li>
           
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
            <h2>Buscar Usuario</h2><br>
    <form method="POST" action="buscarcliente.php">
			<center>Código: <input type="text" name="id"  required><br><br>
			<br>
			<input type="submit" value="BUSCAR" id="BUSCAR" name="BUSCAR"></center>
			</form>
             </div>
</body>
</html>

<?php 
}
?>
	