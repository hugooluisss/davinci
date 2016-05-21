<?php
/**
* TVentaUniformes
* Ventas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TVenta{
	private $idVenta;
	public $responsable;
	public $usuario;
	private $fecha;
	private $tipo; #Tipo 1: uniformes, 2: libros
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TVenta($id = ''){
		$this->responsable = new TResponsable();
		$this->usuario = new TUsuario();
		
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
		$rs = $db->Execute("select * from venta where idVenta = ".$id);
		
		foreach($rs->fields as $field => $val)
			switch($field){
				case 'idResponsable':
					$this->responsable = new TResponsable($val);
				break;
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				default:
					$this->$field = $val;
			}
		
		return true;
	}
	
	/**
	* Retorna el identificador
	*
	* @autor Hugo
	* @access public
	* @return int Identificador
	*/
	public function getId(){
		return $this->idVenta;
	}
	
	/**
	* Establece el cliente
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setResponsable($val = ''){
		$this->responsable = new TResponsable($val);
		
		return true;
	}
	
	/**
	* Establece el usuario
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setUsuario($val = ''){
		$this->usuario = new TUsuario($val);
		
		return true;
	}
	
	/**
	* Establece la fecha
	*
	* @autor Hugo
	* @access public
	* @param mix $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	public function setFecha($val = ''){
		$this->fecha = $val;
		
		return true;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	* Establece el tipo de productos que se vende
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function setTipo($val = 1){
		$this->tipo = $val;
		
		return true;
	}
	
	/**
	* Retorna el tipo de productos que se vende
	*
	* @autor Hugo
	* @access public
	* @return integer Tipo
	*/
	public function getTipo(){
		return $this->tipo;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	public function guardar(){
		if ($this->responsable->getId() == '') return false;
		
		if ($this->usuario->getId() == ''){
			global $userSesion;
			$this->setUsuario($userSesion->getId());
		}
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO venta(idUsuario, idResponsable, fecha, tipo) VALUES (".$this->usuario->getId().", ".$this->responsable->getId().", now(), ".$this->getTipo().")");
			
			$this->idVenta = $db->Insert_ID();
		}
		
		if ($this->idVenta == '') return false;

		$rs = $db->Execute("UPDATE venta
			SET
				idResponsable = ".$this->responsable->getId().",
				fecha = '".$this->getFecha()."'
			WHERE idVenta = ".$this->getId());
			
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
		return $db->Execute("delete from venta where idVenta = ".$this->getId())?true:false;
	}
	
	/**
	* Retorna el saldo de la venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getSaldo(){
		if ($this->getId() == '') return false;
		
		return $this->getMontoVenta() - $this->getMontoPagos();
	}
	
	/**
	* Retorna el total de pagos
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getMontoPagos(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rsPagos = $db->Execute("select sum(monto) as monto from pago where idVenta = ".$this->getId());
		
		return $rsPagos->fields['monto'];
	}
	
	/**
	* Retorna el monto total de la venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function getMontoVenta(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		
		$rsCompra = $db->Execute("select sum(precio) as monto from movventa where idVenta = ".$this->getId());
		
		return $rsCompra->fields['monto'];
	}
	
	/**
	* Aplica la venta
	*
	* @autor Hugo
	* @access public
	* @return decimal Saldo de la cuenta o venta
	*/
	public function aplicar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from movventa where idVenta = ".$this->getId());
		
		while(!$rs->EOF){
			$el = json_decode($rs->fields['adicional']);
			
			switch($this->getTipo()){
				case 1: #Uniformes
					$rs2 = $db->Execute("update existencias set existencia = existencia - ".$rs->fields['cantidad']." where idTalla = ".$el->idTalla." and idUniforme = ".$el->idUniforme);
				break;
				case 2: #libros
					$rs2 = $db->Execute("update libro set existencias = existencias - ".$rs->fields['cantidad']." where idLibro = ".$el->idLibro);
				break;
			}
			
			if ($rs2)
				$db->Execute("update movventa set aplicado = 1 where idMovimiento = ".$rs->fields['idMovimiento']);
				
			$rs->moveNext();
		}
		
		$rs = $db->Execute("update venta set aplicada = 1 where idVenta = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>