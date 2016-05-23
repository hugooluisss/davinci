<?php
include_once(getcwd()."/repositorio/pdf/plantilla.php");

class RCuidados extends RPlantilla{
	public function RCuidados(){
		parent::RPlantilla();
	}	
	
	public function Header(){   	
    	parent:Header("Cuidados a estudiantes");
	}
	
	public function generar($grupo = ''){
		if ($grupo == '') return false;
		
		$this->grupo = new TGrupo($grupo);
		
		
		$this->AddPage();
		$this->SetFillColor(182, 182, 182);
		$this->Cell(8, 5, "", 1, 0, 'C', true);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(80, 5, "NOMBRE DEL ALUMNO", 1, 0, 'C', true);
		
		$this->SetFont('Arial', '', 7);
		for($dia = 1 ; $dia < 32 ; $dia++){
			$this->Cell(3.5, 5, $dia, 1, 0, 'C', true);
		}
	}
}
?>