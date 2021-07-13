<?php
include_once ( 'ClaseUsuario.php' );
include_once ( 'ValidacionesUsuario.php' );
function main()
{
$errores=array();
if(isset($_POST['guardar']))
{
$ced=  $_POST ['cedula'];
$clave=$_POST ['clave'];
$nom=  $_POST ['nombre'];
$ape=  $_POST ['apellido'];
$pai=  $_POST ['pais'];
$ciu=  $_POST ['ciudad'];
$dir=  $_POST ['direccion'];
$cor=  $_POST ['correo'];
$tel=  $_POST ['telefono'];
$U = new  Usuario ();
if(!verificar_cedula($ced)){
$errores[] = 'Ingrese una c\u00E9dula correcta por favor ';
} else{
$U ->setidcliente($ced);
}
$U ->setclave($clave);
if(!validateName($nom)){
$errores[] = 'El nombre no pude tener n\u00FAmeros, ni estar en blanco';
} else{
$U ->setnomcliente ($nom);
}
if(!validateapellido($ape)){
$errores[] = 'El apellido no pude tener n\u00FAmeros, ni estar en blanco';
}else{
$U ->setapecliente($ape);
}
$U ->setpaiscliente ($pai);
$U ->setciucliente ($ciu);
$U ->setdircliente ($dir);
if(!validatetelefono($tel)){
$errores[] = 'El tel\u00E9fono tiene alg\u00FAn error ingreselo correctamente';
} else{
$U -> settelefono ($tel);
}
if(!validateEmail($cor)){
$errores[] = 'Ingrese bien el Correo Electronico porfavor';					
} else{
$U ->setemail ($cor);
}
 if(!$errores){
     if ($U->guardar()) {
echo ("<script> alert('Registro Guardado'); location.href = 'index.php';</script>");
} else {
echo ("<scrip> alert('Error, no en se puede guardar'); location.href = 'index.php';</scrip>");
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="ecua.css"/>
        <link type="text/css" rel="stylesheet" href="administrador.css"/>
        <title>Ingreso Usuario</title>
    </head>
    <body> 
        <div>
            <img id="imagen1" src="banner/banner3.jpg" alt="principal"></img>
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

        <h2>Registrar Usuario</h2>
<br>
<form method="POST" action="ingresocliente.php">
       CEDULA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="cedula" type="text" size="20" required><br><br>
	CONTRASEÑA: <input name="clave" type="password" size="20" required><br><br>
        NOMBRE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="nombre" type="text" size="20" required ><br><br>
        APELLIDO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="apellido" type="text" size="20" required><br><br>
        PAIS:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="pais" type="text" size="20" required><br><br>
        CIUDAD: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="ciudad" type="text" size="20" required><br><br>
        DIRECCION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="direccion" type="text" size="20" required><br><br>
        CORREO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="correo" type="text" size="20" required><br><br>
        TELEFONO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="telefono" type="tel" size="20" required><br><br>
	<input name="guardar" type="submit" value="guardar" id="guardar">
   
        </form>
           

            </div>
             <div id="footer">
                    
                <p>Dirección: 10 DE AGOSTO Y PICHINCHA </p>
                <p>Telefono: 2940-200    Cel:098120649     </p>
                <p>Riobamba-Ecuador</p>
 </div>
        
    </body>
</html>
<?php
}
}
main();

