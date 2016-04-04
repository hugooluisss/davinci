<?php
/**
* TRuta
* Clases rutas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TRuta{
	private $idRuta;
	public $ciclo;
	private $nombre;
	private $costo;
	private $descripcion;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TRuta($id = ''){
		$this->ciclo = new TCiclo;
		$this->setId($id);
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from ruta where idRuta = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idCiclo':
					$this->ciclo = new TCiclo($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idRuta;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ""){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param char $val Estado
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCiclo($val = ''){
		$this->ciclo = new TCiclo($val);
		return true;
	}
	
	/**
	* Establece la descripción
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ""){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el costo
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCosto($val = 0){
		$this->costo = $val;
		return true;
	}
	
	/**
	* Retorna el costo
	*
	* @autor Hugo
	* @access public
	* @return decimal costo
	*/
	
	public function getCosto(){
		return $this->costo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->ciclo->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO ruta(idCiclo) VALUES(".$this->ciclo->getId().");");
			if (!$rs) return false;
				
			$this->idRuta = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE ruta
			SET
				nombre = '".$this->getNombre()."',
				descripcion = '".$this->getDescripcion()."',
				costo = ".$this->getCosto().",
				idCiclo = '".$this->ciclo->getId()."'
			WHERE idRuta = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from ruta where idRuta = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Registra a un estudiante en la ruta
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addEstudiante($estudiante = ''){
		if ($this->getId() == '') return false;
		if ($estudiante == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into estudianteruta(idEstudiante, idRuta) value (".$estudiante.", ".$this->getId().")");
		
		return $rs?true:false;
	}
	
	/**
	* Elimina el registro del estudiante de la ruta
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function delEstudiante($estudiante = ''){
		if ($this->getId() == '') return false;
		if ($estudiante == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from estudianteruta where idEstudiante = ".$estudiante." and idRuta = ".$this->getId());
		
		return $rs?true:false;
	}
}