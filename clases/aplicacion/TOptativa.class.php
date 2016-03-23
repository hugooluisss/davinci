<?php
/**
* TOptativa
* Clases optativas
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TOptativa{
	private $idOptativa;
	public $ciclo;
	private $nombre;
	private $responsable;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TOptativa($id = ''){
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
		$rs = $db->Execute("select * from optativa where idOptativa = ".$id);
		
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
		return $this->idOptativa;
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
	* Establece el responsable
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setResponsable($val = ""){
		$this->responsable = $val;
		return true;
	}
	
	/**
	* Retorna el responsable
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getResponsable(){
		return $this->responsable;
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
			$rs = $db->Execute("INSERT INTO optativa(idCiclo) VALUES(".$this->ciclo->getId().");");
			if (!$rs) return false;
				
			$this->idOptativa = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE optativa
			SET
				nombre = '".$this->getNombre()."',
				responsable = '".$this->getResponsable()."',
				idCiclo = '".$this->ciclo->getId()."'
			WHERE idOptativa = ".$this->getId());
			
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
		$rs = $db->Execute("delete from optativa where idOptativa = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Registra a un estudiante en el curso
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addEstudiante($estudiante = ''){
		if ($this->getId() == '') return false;
		if ($estudiante == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("insert into estudianteoptativa(idEstudiante, idOptativa) value (".$estudiante.", ".$this->getId().")");
		
		return $rs?true:false;
	}
	
	/**
	* Elimina el registro del estudiante al curso optativo
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function delEstudiante($estudiante = ''){
		if ($this->getId() == '') return false;
		if ($estudiante == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from estudianteoptativa where idEstudiante = ".$estudiante." and idOptativa = ".$this->getId());
		
		return $rs?true:false;
	}
}