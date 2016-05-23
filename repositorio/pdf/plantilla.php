<?php
//require_once('Image_Barcode-1.1.0/Barcode.php');
/*
 * Created on 11/02/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class RPlantilla extends tFPDF{
	public function RPlantilla(){
		parent::tFPDF('P', 'mm', 'Letter');
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->cleanFiles();
		
		
	}	
	
	public function Header($nombre = ''){   	
    	$this->SetFont('Arial', 'B', 14);
    	$this->Cell(0, 6, "INSTITUTO CULTURAL LEONARDO DA VINCI", 0, 1, 'C');
    	$this->Cell(0, 6, utf8_decode("CICLO ESCOLAR ".$this->grupo->ciclo->getNombre()), 0, 1, 'C');
    	
    	if ($this->grupo <> ''){
	    	$db = TBase::conectaDB();
	    	$rs = $db->Execute("select a.*, b.nombre as nivel from grado a join nivel b using(idNivel) where idGrado = ".$this->grupo->getGrado());
	    	$this->Cell(0, 6, utf8_decode($rs->fields['nombre'].' '.$this->grupo->getNombre().'   '.$rs->fields['nivel']), 0, 1, 'C');
	    	$this->Cell(0, 6, utf8_decode($nombre), 0, 1, 'C');
	    }
    	
    	$this->Ln(10);
    	
    	$this->Image('repositorio/formato/davinciFormato.jpg', 10, 5, 30, 40);
    	$this->Image('repositorio/formato/gobiernoFormato.jpg', 180, 5, 30, 30);
    	
    	$this->SetFont('Sans', '', 12);
	}
		
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf'){
            	$path = $dir.'/'.$file;
            	if($t-filemtime($path)>3600)
                	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function Output(){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.pdf');
		$file .= '.pdf';
		$this->cleanFiles();
		parent::Output($file, 'F');
		chmod($file, 0555);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
}
?>