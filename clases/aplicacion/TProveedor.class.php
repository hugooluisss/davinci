<?php
/**
* TProveedor
* Proveedor
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TProveedor{
	private $idProveedor;
	private $nombre;
	private $telefono;
	private $email;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProveedor($id = ''){
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
		$rs = $db->Execute("select * from proveedor where idProveedor = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
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
		return $this->idProveedor;
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
	* Establece el teléfono
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ""){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna el telefono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ""){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO proveedor(nombre) VALUES('');");
			if (!$rs) return false;
				
			$this->idProveedor = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE proveedor
			SET
				nombre = '".$this->getNombre()."',
				telefono = '".$this->getTelefono()."',
				email = '".$this->getEmail()."'
			WHERE idProveedor = ".$this->getId());
			
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
		$rs = $db->Execute("delete from proveedor where idProveedor = ".$this->getId());
		
		return $rs?true:false;
	}
}