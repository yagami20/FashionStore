<?php
include_once ( 'ClaseUsuario.php' );
fnSessionStart();
$R = new Usuario ();
$id= $_SESSION["codigo"];
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
                <li><a href="default.php">INICIO</a></li>
            </ul>
            </div>
        <div class="in1">

        <h2>Modificar Mis Datos</h2>
<br>
<form method="POST" action="modusua1.php">
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




