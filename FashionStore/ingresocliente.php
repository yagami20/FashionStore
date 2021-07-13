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
$errores[] = 'El nombre no puede tener n\u00FAmeros, ni estar en blanco';
} else{
$U ->setnomcliente ($nom);
}
if(!validateapellido($ape)){
$errores[] = 'El apellido no puede tener n\u00FAmeros, ni estar en blanco';
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
        <title>Ingreso Usuario</title>
    </head>
    <body> 
        <div>
            <img id="imagen1" src="banner/banner3.jpg" alt="principal"></img>
         </div >
        <hr>
         <div class="vis">
         <h4>Quienes somos</h4>
            <p>Clothes store es una empresa encargada de la expendicion de prendas de vestir tanto como caballero
            y dama dando a sus clientes el mejor servicio</p>
            <h4>Misión</h4>
            <p>Expender prendas de vestir de alta calidad para un mercado 
               exigente y competitivo con eficiencia y responsabilidad.</p>
            <h4>Visión </h4>
            <p>Ser una empresa líder en el mercado nacional </p>
        </div>
         <div id="menu">
            <ul>
                <li><a href="index.php">INICIO</a></li>
                
            </ul>
            </div>
        <div class="in">
    
        <h2>Registrar Usuario</h2>
<br>
<form method="POST" action="ingresocliente.php">
        CEDULA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="cedula" type="text" size="20" ><br><br>
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

