<?php
/**
* TAsignatura
* Asignatura
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TLibros{
	private $idLibro;
	public $editorial;
	private $clave;
	private $nombre;
	private $preciolista;
	private $precioventa;
	private $existencias;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TAsignatura($id = ''){
		$this->plan = new TEditorial;
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
		$rs = $db->Execute("select * from libro where idLibro = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idEditorial':
					$this->editorial = new TEditorial($val);
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
		return $this->idLibro;
	}
	
	/**
	* Establece el plan de estudios
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEditorial($val = ""){
		$this->plan = new TEditorial($val);
		
		return true;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setClave($val = ""){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getClave(){
		return $this->clave;
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
	* Establece el precio de lista
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecioLista($val = 0){
		$this->preciolista = $val;
		return true;
	}
	
	/**
	* Retorna el precio de lista
	*
	* @autor Hugo
	* @access public
	* @return integer precio
	*/
	
	public function getPrecioLista(){
		return $this->preciolista;
	}
	
	/**
	* Establece el precio de venta
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecioVenta($val = 0){
		$this->precioventa = $val;
		return true;
	}
	
	/**
	* Retorna el precio de venta
	*
	* @autor Hugo
	* @access public
	* @return integer Identificador
	*/
	
	public function getPrecioVenta(){
		return $this->precioventa;
	}
	
	/**
	* Establece las existencias
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setGrado($val = 0){
		$this->existencias = $val;
		return true;
	}
	
	/**
	* Retorna las existencias
	*
	* @autor Hugo
	* @access public
	* @return integer Identificador
	*/
	
	public function getExistencias(){
		return $this->existencias;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->editorial->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO libro(idEditorial) VALUES(".$this->editorial->getId().");");
			if (!$rs) return false;
				
			$this->idLibro = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE libro
			SET
				idEditorial = ".$this->editorial->getId().",
				nombre = '".$this->getNombre()."',
				clave = '".$this->getClave()."',
				preciolista = ".$this->getPrecioLista().",
				precioventa = ".$this->getPrecioVenta()."
				existencias = ".$this->getExistencias()."
			WHERE idLibro = ".$this->getId());
			
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
		$rs = $db->Execute("delete from libro where idLibro = ".$this->getId());
		
		return $rs?true:false;
	}
}