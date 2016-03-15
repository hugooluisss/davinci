<?php
/**
* TEstudiante
* Estudiantes
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TEstudiante{
	private $idEstudiante;
	private $idSanguineo;
	private $nombre;
	private $app;
	private $apm;
	private $nacimiento;
	private $idEstadoNac;
	private $calle;
	private $noExt;
	private $noInt;
	private $colonia;
	private $codigoPostal;
	private $curp;
	private $delegacion;
	private $estatura;
	private $peso;
	private $estado;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TEstudiante($id = ''){
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
		$rs = $db->Execute("select * from estudiante where idEstudiante = ".$id);
		
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
		return $this->idEstudiante;
	}
	
	/**
	* Establece el identificador del grupo sanguineo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSanguineo($val = ""){
		$this->idSanguineo = $val;
		return true;
	}
	
	/**
	* Retorna el grupo sanguineo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSanguineo(){
		return $this->idSanguineo;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombreSanguineo(){
		if ($rs->getSanguineo() == '') return false;
		$db = TBase::conectaDB();
		$rs = $db->Execute("select abbr from gruposanguineo where idSanguineo = ".$this->getSanguineo());
		
		return $this->abbr;
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
	* Establece el apellido paterno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApp($val = ""){
		$this->app = $val;
		return true;
	}
	
	/**
	* Retorna el apellido paterno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApp(){
		return $this->app;
	}
	
	/**
	* Establece el Apellido materno
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApm($val = ""){
		$this->apm = $val;
		return true;
	}
	
	/**
	* Retorna el apellido materno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApm(){
		return $this->apm;
	}
	
	/**
	* Establece la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFechaNacimiento($val = ""){
		$this->nacimiento = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @return date Texto
	*/
	
	public function getFechaNacimiento(){
		return $this->nacimiento;
	}
	
	/**
	* Establece el estado de nacimiento
	*
	* @autor Hugo
	* @access public
	* @param int $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstadoNacimiento($val = ""){
		$this->idEstadoNac = $val;
		return true;
	}
	
	/**
	* Retorna el identificador del estado de nacimiento
	*
	* @autor Hugo
	* @access public
	* @return integer Texto
	*/
	
	public function getEstadoNacimiento(){
		return $this->idEstadoNac;
	}
	
	/**
	* Retorna el nombre del estado de nacimiento
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombreEstadoNacimiento(){
		if ($rs->getSanguineo() == '') return false;
		$db = TBase::conectaDB();
		$rs = $db->Execute("select nombre from estado where idEstado = ".$this->getEstadoNacimiento());
		
		return $this->nombre;
	}
	
	/**
	* Establece la calle
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCalle($val = ""){
		$this->calle = $val;
		return true;
	}
	
	/**
	* Retorna el nombre de la calle
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCalle(){
		return $this->calle;
	}
	
	/**
	* Establece el NoExt
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNumeroExterior($val = ""){
		$this->noExt = $val;
		return true;
	}
	
	/**
	* Retorna el número exterior
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNumeroExterior(){
		return $this->noExt;
	}
	
	/**
	* Establece el Número interior
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNumeroInterior($val = ""){
		$this->noInt = $val;
		return true;
	}
	
	/**
	* Retorna el Número interior
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNumeroInterior(){
		return $this->noInt;
	}
	
	/**
	* Establece la colonia
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setColonia($val = ""){
		$this->colonia = $val;
		return true;
	}
	
	/**
	* Retorna la colonia
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getColonia(){
		return $this->colonia;
	}
	
	/**
	* Establece el código postal
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCodigoPostal($val = ""){
		$this->codigoPostal = $val;
		return true;
	}
	
	/**
	* Retorna el código postal
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCodigoPostal(){
		return $this->codigoPostal;
	}
	
	/**
	* Establece la curp
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCURP($val = ""){
		$this->curp = $val;
		return true;
	}
	
	/**
	* Retorna la curp
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCURP(){
		return $this->curp;
	}
	
	/**
	* Establece la delegacion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDelegacion($val = ""){
		$this->delegacion = $val;
		return true;
	}
	
	/**
	* Retorna la delegacion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDelegacion(){
		return $this->delegacion;
	}
	
	/**
	* Establece la estatura
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstatura($val = 0){
		$this->estatura = $val;
		return true;
	}
	
	/**
	* Retorna la estatura
	*
	* @autor Hugo
	* @access public
	* @return decimal Estatura
	*/
	
	public function getEstatura(){
		return $this->estatura;
	}
	
	/**
	* Establece el peso
	*
	* @autor Hugo
	* @access public
	* @param decimal $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApm($val = 0){
		$this->peso = $val;
		return true;
	}
	
	/**
	* Retorna el peso
	*
	* @autor Hugo
	* @access public
	* @return decimal Texto
	*/
	
	public function getPeso(){
		return $this->peso;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param char $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = 'A'){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return char Texto
	*/
	
	public function getEstado(){
		return $this->estado;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->getSanguineo() == '') return false;
		if ($this->getEstadoNacimiento() == '') return false;
		
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO estudiante(idSanguineo, idEstadoNacimiento) VALUES(".$this->getSanguineo().", ".$this->getEstadoNacimiento().");");
			if (!$rs) return false;
				
			$this->idEstudiante = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE estudiante
			SET
				idSanguineo = ".$this->getSanguineo().",
				nombre = '".$this->getNombre()."',
				app = '".$this->getApp()."',
				apm = '".$this->getApm()."',
				nacimiento = '".$this->getNacimiento()."',
				idEstadoNac = ".$this->getEstadoNacimiento().",
				calle = '".$this->getCalle()()."',
				noInt = '".$this->getNoInt()."',
				colonia = '".$this->getColonia()."',
				codigoPostal = '".$this->getCodigoPostal()."',
				delegacion = '".$this->getDelegacion()."',
				curp = '".$this->getCURP()."',
				estatura = ".$this->getEstatura().",
				peso = ".$this->getPeso().",
				estado = '".$this->getEstado()."',
				matricula = ".$this->getMatricula()."
			WHERE idEstudiante = ".$this->getId());
			
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
		$rs = $db->Execute("delete from estudiante where idEstudiante = ".$this->getId());
		
		return $rs?true:false;
	}
}