<?php
include_once('egcc.php');

class Pedido
{

//atributo
private $idpedido;
private $estado;
	
//funciones
public function __construct()
{
} 
public function getidpedido()
{
 return $this->idpedido;
}
public function setidpedido($idpedido)
{
$this->idpedido=$idpedido;
}		
public function getestado()
{
 return $this->estado;
}
public function setestado($estado)
{
$this->estado=$estado;
}
	
		
public function modificarestado()
{
  $Cons= new conexion();
  $sql="update pedido set estado='$this->estado' where idpedido='$this->idpedido'";
  return($Cons->Ejecutar_consulta($sql));
}

}
?>