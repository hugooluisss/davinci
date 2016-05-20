<?php
/**
* TAsignatura
* Asignatura
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TAsignatura{
	private $idAsignatura;
	public $plan;
	public $idGrado;
	private $clave;
	private $nombre;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TAsignatura($id = ''){
		$this->plan = new TPlanEstudios;
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
		$rs = $db->Execute("select * from asignatura where idAsignatura = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idPlan':
					$this->plan = new TPlanEstudios($val);
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
		return $this->idAsignatura;
	}
	
	/**
	* Establece el plan de estudios
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPlan($val = ""){
		$this->plan = new TPlanEstudios($val);
		
		return true;
	}
	
	/**
	* Establece el grado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setGrado($val = ""){
		$this->idGrado = $val;
		return true;
	}
	
	/**
	* Retorna el grado
	*
	* @autor Hugo
	* @access public
	* @return integer Identificador
	*/
	
	public function getGrado(){
		return $this->idGrado;
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
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->plan->getId() == '') return false;
		if ($this->getGrado() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO asignatura(idPlan, idGrado) VALUES(".$this->plan->getId().", ".$this->getGrado().");");
			if (!$rs) return false;
				
			$this->idAsignatura = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE asignatura
			SET
				idGrado = ".$this->getGrado().",
				nombre = '".$this->getNombre()."',
				clave = '".$this->getClave()."'
			WHERE idAsignatura = ".$this->getId());
			
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
		$rs = $db->Execute("delete from asignatura where idAsignatura = ".$this->getId());
		
		return $rs?true:false;
	}
}