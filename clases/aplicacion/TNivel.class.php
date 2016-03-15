<?php
/**
* TNivel
* Nivel de estudios
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TNivel{
	private $idNivel;
	private $inicial; 
	private $nombre;
	private $consecutivo;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TNivel($id = ''){
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
		$rs = $db->Execute("select * from nivel where idNivel = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
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
		return $this->idNivel;
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
	* Retorna la inicial
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getInicial(){
		return $this->inicial;
	}
	
	/**
	* Retorna el último consecutivo
	*
	* @autor Hugo
	* @access public
	* @return int Consecutivo
	*/
	
	public function getConsecutivo(){
		return $this->consecutivo;
	}
	
	/**
	* Guarda el consecutivo siguiente
	*
	* @autor Hugo
	* @access public
	* @param boolean $band Si es true realiza el cambio, si no, solo retorna el siguiente
	* @return integer siguiente
	*/
	
	public function siguiente($band = false){
		if ($this->getId() == '') return false;
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select consecutivo+1 as next from nivel where idNivel = ".$this->getId());
		$next = $rs->fields['next'];

		if ($band){
			$rs = $db->Execute("UPDATE nivel
				SET
					consecutivo = consecutivo + 1
				WHERE idNivel = ".$this->getId());
		}
			
		return $next;
	}
	
	/**
	* Generar matrícula
	*
	* @autor Hugo
	* @access public
	* @param $anio Año de ingreso del estudiante
	* @param $sexo Identificador del sexo
	* @return integer siguiente
	*/
	
	public function generaMatricula($anio, $idEstudiante){
		if ($this->getId() == '') return false;
		if ($idEstudiante == '') return false;
		
		$estudiante = new TEstudiante($idEstudiante);
		$db = TBase::conectaDB();
		do{
			$matricula = strtoupper($this->getInicial().$anio.$estudiante->getSexo().sprintf("%05s", $this->siguiente(true)));
			$rs = $db->Execute("select idEstudiante from estudiantenivel where matricula = '".$matricula."'");
			
		}while(!$rs->EOF);
		
		$db->Execute("update estudiantenivel set estado = 'I' where idEstudiante = ".$estudiante->getId());
		$rs = $db->Execute("insert into estudiantenivel (matricula, idEstudiante, idNivel, anio, estado) values ('".$matricula."', ".$estudiante->getId().", ".$this->getId().", '".$anio."', 'A')");
		
		return $rs?true:false;
	}
	
	/**
	* Establece el consecutivo
	*
	* @autor Hugo
	* @access public
	* @param boolean $band Si es true realiza el cambio, si no, solo retorna el siguiente
	* @return integer siguiente
	*/
	
	public function consecutivo($val = 0){
		if ($this->getId() == '') return false;
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("update nivel set consecutivo = ".$val." where idNivel = ".$this->getId());
			
		return $rs?true:false;
	}
}