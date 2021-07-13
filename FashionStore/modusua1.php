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
    if( $U->modificar()){
 echo ("<script> alert('Registro Modificado,Se cerrara sesiòn para actualizar sus datos'); location.href = 'index.php';</script>");
} else {
echo ("<scrip> alert('Error, no se puede Modificar'); location.href = 'index.php';</scrip>");
}
}
else{
$errorya=$errores[0];
 echo ("<script> alert('$errorya'); location.href = 'javascript:history.go(-1)';</script>");
}
}
}
main();

