<?php
include_once('egcc.php');
class Producto
{
	//atributos
private $idarticulo;
private $nomarticulo;
private $color;
private $medida;
private $precio;
private $stock;
private $imagen;
private $mostrarDatos=array();
//funciones
public function __construct()
{
$this->idarticulo="";
$this->nomarticulo="";
$this->color="";
$this->medida="";
$this->precio="";
$this->stock="";
$this->imagen="";
	} 
        public function getidarticulo(){
		return $this->idarticulo;
	}
	public function setidarticulo($idarticulo){
		$this->idarticulo=$idarticulo;
	}
        
	public function getnomarticulo(){
		return $this->nomarticulo;
	}
	public function setnomarticulo($nomarticulo){
		$this->nomarticulo=$nomarticulo;
	}
	public function getcolor(){
		return $this->color;
	}
	public function setcolor($color){
		$this->color=$color;
	}
        public function getmedida(){
		return $this->medida;
	}
	public function setmedida($medida){
		$this->medida=$medida;
	}
        public function getprecio(){
		return $this->precio;
	}
	public function setprecio($precio){
		$this->precio=$precio;
	}
        public function getstock(){
		return $this->stock;
	}
	public function setstock($stock){
		$this->stock=$stock;
	}
        public function getimagen(){
		return $this->imagen;
	}
	public function setimagen($imagen){
		$this->imagen=$imagen;
	}

//funciones
	
public function guardar()
{
      $Cons= new conexion();
      $sql="INSERT INTO `articulo` (`idarticulo`, `nomarticulo`, `color`, `medida`, `precio`, `stock`,`imagen`)   
      values('$this->idarticulo','$this->nomarticulo','$this->color','$this->medida','$this->precio','$this->stock','$this->imagen')";
      $result=$Cons->Ejecutar_consulta($sql);
       if($result)
	   {
      return true;
      $Cons->Ejecutar_consulta("COMMIT");
	  $Cons->cerrarconexion();
	  }
      else
	  {
      return false;  
      $Cons->Ejecutar_consulta("ROLLBACK");
	  $Cons->cerrarconexion();
	  }
}



public function modificar()
{
$Cons= new conexion();
$sql="UPDATE articulo set nomarticulo='$this->nomarticulo',color='$this->color',medida='$this->medida',precio='$this->precio',stock='$this->stock' where idarticulo=$this->idarticulo";
$result=$Cons->Ejecutar_consulta($sql);
if($result)
{
   $Cons->Ejecutar_consulta("ROLLBACK");
   return true;
   $Cons->cerrarconexion();
}
else
{
   $Cons->Ejecutar_consulta("COMMIT");
   return false;  
   $Cons->cerrarconexion();
 }
  
}

public function buscar_id($criterio)
{
 $Cons= new conexion();
$sql="select * from articulo where idarticulo like '$criterio'";
return($Cons->Ejecutar_consulta($sql));
}  	
public function buscar_nombre($criterio)
{
$sql="select * from TUSUARIOS where Nombre like '%$criterio'";
return(parent::Ejecutar_consulta($sql));
}
 
public function buscar_apellidos($criterio)
{
$Cons= new conexion();
$sql="select * from TUSUARIOS where Apellidos like '%$criterio'";


return($Cons->Ejecutar_consulta($sql));
}


public function 
consultaatributos($id)
{ 
 $Cons= new conexion();
  $sql = "SELECT IdReloj,DescripcionReloj,PrecioReloj,DescripcionReloj,PrecioReloj,ImagenReloj FROM TRELOJ WHERE IdReloj='$id'";
 return($Cons->Ejecutar_consulta($sql));
}

 
 public function obtenerDatos()
{
        $sql=("select * from articulo");
        $Cons= new conexion();
		$datos=$Cons->Ejecutar_consulta($sql);   
        while ($enviarDatos=mysql_fetch_array($datos))
		{
			$this->mostrarDatos[]=$enviarDatos;
        }   
        
      
}

 public function obtenerDatosTodosRelojes()
{
        $sql=("select * from articulo");
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





