<?php
/**
* TResponsable
* Cuidados a estudiantes
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TResponsable{
	private $idResponsable;
	private $nombre;
	private $app;
	private $apm;
	private $ocupacion;
	private $empresa;
	private $telefono;
	private $extension;
	private $telefonoContacto;
	private $celular;
	private $correo;
	private $puesto;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TResponsable($id = ''){
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
		$rs = $db->Execute("select * from responsable where idResponsable = ".$id);
		
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
		return $this->idResponsable;
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
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApp($val = ''){
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
	* Establece el apellido materno
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApm($val = ''){
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
	* Establece la ocupación
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setOcupacion($val = ''){
		$this->ocupacion = $val;
		return true;
	}
	
	/**
	* Retorna el apellido paterno
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getOcupacion(){
		return $this->ocupacion;
	}
	
	/**
	* Establece la empresa
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmpresa($val = ''){
		$this->empresa = $val;
		return true;
	}
	
	/**
	* Retorna la empresa
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmpresa(){
		return $this->empresa;
	}
	
	/**
	* Establece el telefono de la empresa
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ''){
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
	* Establece el número de extensión en la empresa
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setExtension($val = ''){
		$this->extension = $val;
		return true;
	}
	
	/**
	* Retorna el número de extensión en la empresa
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getExtension(){
		return $this->extension;
	}
	
	/**
	* Establece telefono en casa
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefonoContacto($val = ''){
		$this->telefonoContacto = $val;
		return true;
	}
	
	/**
	* Retorna el telefono de contracto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefonoContacto(){
		return $this->telefonoContacto;
	}
	
	/**
	* Establece el número de celular
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCelular($val = ''){
		$this->celular = $val;
		return true;
	}
	
	/**
	* Retorna el número de celular
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCelular(){
		return $this->celular;
	}
	
	/**
	* Establece la dirección de correo electrónico
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCorreo($val = ''){
		$this->correo = $val;
		return true;
	}
	
	/**
	* Retorna el correo electrónico
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCorreo(){
		return $this->correo;
	}
	
	/**
	* Establece el puesto
	*
	* @autor Hugo
	* @access public
	* @param string $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPuesto($val = ''){
		$this->puesto = $val;
		return true;
	}
	
	/**
	* Retorna el puesto
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPuesto(){
		return $this->puesto;
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
			$rs = $db->Execute("INSERT INTO responsable(nombre) VALUES('".$this->getNombre()."');");
			if (!$rs) return false;
				
			$this->idResponsable = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE responsable
			SET
				nombre = '".$this->getNombre()."',
				app = '".$this->getApp()."',
				apm = '".$this->getApm()."',
				ocupacion = '".$this->getOcupacion()."',
				empresa = '".$this->getEmpresa()."',
				telefono = '".$this->getTelefono()."',
				extension = '".$this->getExtension()."',
				telefonoContacto = '".$this->getTelefonoContacto()."',
				celular = '".$this->getCelular()."',
				correo = '".$this->getCorreo()."',
				puesto = '".$this->getPuesto()."'
			WHERE idResponsable = ".$this->getId());
			
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
		$rs = $db->Execute("delete from responsable where idResponsable = ".$this->getId());
		
		return $rs?true:false;
	}
}