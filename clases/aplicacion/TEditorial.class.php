<?php
/**
* TEditorial
* Editoriales
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TEditorial{
	private $idEditorial;
	private $nombre;
	private $comentarios;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TEditorial($id = ''){
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
		$rs = $db->Execute("select * from editorial where idEditorial = ".$id);
		
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
		return $this->idEditorial;
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
	* Establece los comentarios
	*
	* @autor Hugo
	* @access public
	* @param string $val Comentarios
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setComentarios($val = ''){
		$this->comentarios = $val;
		return true;
	}
	
	/**
	* Retorna los comentarios
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getComentarios(){
		return $this->comentarios;
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
			$rs = $db->Execute("INSERT INTO editorial(nombre) VALUES('');");
			if (!$rs) return false;
				
			$this->idEditorial = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE editorial
			SET
				nombre = '".$this->getNombre()."',
				comentarios = '".$this->getComentarios()."'
			WHERE idEditorial = ".$this->getId());
			
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
		$rs = $db->Execute("delete from editorial where idEditorial = ".$this->getId());
		
		return $rs?true:false;
	}
}