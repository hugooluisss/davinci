<?php
/**
* TGrupo
* Grupos
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TGrupo{
	private $idGrupo;
	public $ciclo;
	private $idGrado; 
	private $nombre;
	private $estado;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TGrupo($id = ''){
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
		$rs = $db->Execute("select * from grupo where idGrupo = ".$id);
		
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
		return $this->idGrupo;
	}
	
	/**
	* Establece el ciclo
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCiclo($val = ""){
		$this->ciclo = new TCiclo($val);
		return true;
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
	
	public function setEstado($val = 'A'){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado;
	}
	
	/**
	* Establece el grado
	*
	* @autor Hugo
	* @access public
	* @param char $val Valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setGrado($val = 1){
		$this->idGrado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getGrado(){
		return $this->idGrado;
	}
	
	/**
	* Retorna el nombre del grado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombreGrado(){
		$db = TBase::conectaDB();
		if ($this->idGrado == '') return '';
		
		$rs = $db->Execute("select * from grado where idGrado = ".$this->idGrado);
		
		return $rs->fields['nombre'];
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
		if ($this->getGrado() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO grupo(idCiclo, idGrado) VALUES(".$this->ciclo->getId().", ".$this->getGrado().");");
			if (!$rs) return false;
				
			$this->idGrupo = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE grupo
			SET
				idCiclo = ".$this->ciclo->getId().",
				idGrado = ".$this->getGrado().",
				nombre = '".$this->getNombre()."',
				estado = '".$this->getEstado()."'
			WHERE idGrupo = ".$this->getId());
			
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
		$rs = $db->Execute("delete from grupo where idGrupo = ".$this->getId());
		
		return $rs?true:false;
	}
	
	
}