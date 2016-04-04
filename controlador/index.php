<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select nombre, app, apm, nacimiento from estudiante where extract(MONTH from nacimiento) = ".date("m")." and extract(DAY from nacimiento) = ".date("d")." and estado = 'A' order by app, apm, nombre;");
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
}
?>