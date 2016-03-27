<?php
/**
* TPermiso
* Permisos justificados de estudiantes
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPermiso{
	private $idPermiso;
	public $estudiante;
	private $fecha;
	private $dias;
	private $comentario;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPermiso($id = ''){
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
		$this->estudiante = new TEstudiante;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from permiso where idPermiso = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idEstudiante':
					$this->estudiante = new TEstudiante($val);
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
		return $this->idPermiso;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ""){
		$this->fecha = $val;
		return true;
	}
	
	/**
	* Establece el estudiante
	*
	* @autor Hugo
	* @access public
	* @param int Identificador del estudiante
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstudiante($estudiante){
		$this->estudiante = new TEstudiante($estudiante);
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
	* Establece el comentario
	*
	* @autor Hugo
	* @access public
	* @param char $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setComentario($val = ''){
		$this->comentario = $val;
		return true;
	}
	
	/**
	* Retorna el comentario
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getComentario(){
		return $this->comentario;
	}
	
	/**
	* Establece el número de dias
	*
	* @autor Hugo
	* @access public
	* @param int $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDias($val = 0){
		$this->dias = $val;
		return true;
	}
	
	/**
	* Retorna el número de dias
	*
	* @autor Hugo
	* @access public
	* @return Integer val
	*/
	
	public function getDias(){
		return $this->dias;
	}
	
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->estudiante->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO permiso(idEstudiante) VALUES(".$this->estudiante->getId().");");
			if (!$rs) return false;
				
			$this->idPermiso = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE permiso
			SET
				fecha = '".$this->getFecha()."',
				dias = ".$this->getDias().",
				comentario = '".mysql_escape_string($this->getComentario())."'
			WHERE idPermiso = ".$this->getId());
			
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
		$rs = $db->Execute("delete from permiso where idPermiso = ".$this->getId());
		
		return $rs?true:false;
	}
}