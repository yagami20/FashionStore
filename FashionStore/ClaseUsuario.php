<?php
//Capa negocio 
include_once('egcc.php');
class Usuario 
{
	//atributos
	private $idcliente;
	private $clave;
	private $nomcliente;
	private $apecliente;
	private $paiscliente;
	private $ciucliente;
	private $dircliente;
	private $email;
	private $telefono;	
	private $mostrarDatos= array();
	//funciones
	public function __construct()
	{
	  
      $this->idcliente="";
      $this->clave="";
      $this->nomcliente="";
      $this->apecliente="";
      $this->paiscliente="";
      $this->ciucliente="";
      $this->dircliente="";
      $this->email="";
      $this->telefono="";
	  
	} 
	
	public function getidcliente(){
		return $this->idcliente;
	}
	public function setidcliente($idcliente){
		$this->idcliente=$idcliente;
	}
	public function getclave(){
		return $this->clave;
	}
	public function setclave($clave){
		$this->clave=$clave;
	}
	
	public function setnomcliente($nomcliente)
	{
		 $this->nomcliente=$nomcliente;
	}
	public function getnomcliente(){
		return $this->nomcliente;
	}
	public function getapecliente(){
		return $this->apecliente;
	}
	public function setapecliente($apecliente){
		$this->apecliente=$apecliente;
	}
	public function getpaiscliente(){
		return $this->paiscliente;
	}
	public function setpaiscliente($paiscliente){
		$this->paiscliente=$paiscliente;
	}
	
	public function getciucliente(){
		return $this->ciucliente;
	}
	public function setciucliente($ciucliente){
		$this->ciucliente=$ciucliente;
	}
	public function getdircliente(){
		return $this->dircliente;
	}
	public function setdircliente($dircliente){
		$this->dircliente=$dircliente;
	}
	public function getemail(){
		return $this->email;
	}
	public function setemail($email){
		$this->email=$email;
	}
	
	public function gettelefono(){
		return $this->telefono;
	}
	public function settelefono($telefono){
		$this->telefono=$telefono;
	}
	
	
//funciones

//funcion registrar usuarios
	
public function guardar()
{
$Cons= new conexion();
$sql="INSERT INTO `cliente` (`idcliente`, `clave`, `nomcliente`, `apecliente`, `paiscliente`, `ciucliente`, `dircliente`, `email`, `telefono`)  
values('$this->idcliente','$this->clave','$this->nomcliente','$this->apecliente','$this->paiscliente','$this->ciucliente','$this->dircliente','$this->email','$this->telefono')";
$result=$Cons->Ejecutar_consulta($sql);
if($result)
   return true;
else
   return false;  
}

//funcion modificar usuarios
public function modificar()
{
$Cons= new conexion();
$sql="UPDATE `cliente` SET `clave`='$this->clave', `nomcliente`='$this->nomcliente', `apecliente`='$this->apecliente', `paiscliente`='$this->paiscliente', `ciucliente`='$this->ciucliente', `dircliente`='$this->dircliente', `email`='$this->email', `telefono`='$this->telefono' WHERE `idcliente`='$this->idcliente'";
$result=$Cons->Ejecutar_consulta($sql);
if($result)
   return true;
else
   return false;  
 
}

//funcion eliminar usuarios
public function eliminar()
{
 $Cons= new conexion();
$sql="DELETE FROM `cliente` WHERE `idcliente`='$this->idcliente'";
$result=$Cons->Ejecutar_consulta($sql);
if($result)
   return true;
else
   return false;  
 
}

//funcion buscar usuario por nombre
   	
public function buscar_nombre($criterio)
{
 $Cons= new conexion();
$sql="select * from TUSUARIOS where Nombre like '%$criterio'";
  return($Cons->Ejecutar_consulta($sql));
}
 //funcion buscar usuario por apellido
public function buscar_apellidos($criterio)
{
$sql="select * from TUSUARIOS where Apellidos like '%$criterio'";
return(parent::Ejecutar_consulta($sql));
}
//funcion buscar usuario por Numero de Cedula
public function buscar_num_cedula($criterio)
{
 $Cons= new conexion();
$sql="select * from cliente where idcliente like '$criterio'";
return($Cons->Ejecutar_consulta($sql));
}
public function buscar_nombre_usuario($criterio)
{
 $Cons= new conexion();
$sql="select * from CLIENTE where CORREO like '$criterio'";
return($Cons->Ejecutar_consulta($sql));
}

public function buscar_contra($criterio)
{
 $Cons= new conexion();
$sql="select * from CLIENTE where CLAVE like '$criterio'";
return($Cons->Ejecutar_consulta($sql));
}
public function buscar_contra_nusuario($criterio,$criterio2)
{

$Cons= new conexion();
$sql="select * from TUSUARIOS where TextPassword like '$criterio' and NombreUsuario like '$criterio2'";
return($Cons->Ejecutar_consulta($sql));

}

//Reporte clientes

 public function obtenerDatos()
{
        $sql=("select * from cliente");
        $Cons= new conexion();
		$datos=$Cons->Ejecutar_consulta($sql);   
        while ($enviarDatos=mysql_fetch_array($datos))
		{
			$this->mostrarDatos[]=$enviarDatos;
        }   
        
      
}

public function getMostrarDatos()
{
            return $this->mostrarDatos;
} 


}
?>