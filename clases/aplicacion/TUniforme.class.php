<?php
/**
* TUniforme
* Ropa
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TUniforme{
	private $idUniformar;
	public $proveedor;
	public $tipo;
	private $clave;
	private $nombre;
	private $preciolista;
	private $precioventa;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TUniforme($id = ''){
		$this->proveedor = new TProveedor;
		$this->tipo = new TTipoPrenda;
		
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
		$rs = $db->Execute("select * from uniforme where idUniforme = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idProveedor':
					$this->proveedor = new TProveedor($val);
				break;
				case 'idTipo':
					$this->tipo = new TTipoPrenda($val);
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
		return $this->idUniforme;
	}
	
	/**
	* Establece el proveedor
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setProveedor($val = ""){
		$this->proveedor = TProveedor($val);
		
		return true;
	}
	
	/**
	* Establece el tipo de prenda
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = ""){
		$this->tipo = TTipoPrenda($val);
		
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
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecioLista($val = 0){
		$this->precioLista = $val;
		return true;
	}
	
	/**
	* Retorna el precio de lista
	*
	* @autor Hugo
	* @access public
	* @return decimal Texto
	*/
	
	public function getPrecioLista(){
		return $this->preciolista;
	}
	
	/**
	* Establece el precio de venta
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecioVenta($val = 0){
		$this->precioVenta = $val;
		
		return true;
	}
	
	/**
	* Retorna el precio de venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Texto
	*/
	
	public function getPrecioVenta(){
		return $this->precioVenta;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->proveedor->getId() == '') return false;
		if ($this->tipo->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO uniforme(idProveedor, idTipo) VALUES(".$this->proveedor->getId().", ".$this->tipo->getId().");");
			if (!$rs) return false;
				
			$this->idUniforme = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE uniforme
			SET
				idProveedor = ".$this->proveedor->getId().",
				idTipo = ".$this->tipo->getId().",
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				preciolista = ".$this->getPrecioLista().",
				precioventa = ".$this->getPrecioVenta()."
			WHERE idUniforme = ".$this->getId());
			
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
		$rs = $db->Execute("delete from uniforme where idUniforme = ".$this->getId());
		
		return $rs?true:false;
	}
}