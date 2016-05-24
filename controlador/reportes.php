<?php
global $objModulo;
switch($objModulo->getId()){
	case 'reportesEstudiantes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select idGrupo, idNivel, a.nombre as grupo, b.nombre as ciclo, c.nombre as grado, d.nombre as nivel from grupo a join ciclo b using(idCiclo) join grado c using(idGrado) join nivel d using(idNivel) where a.estado = 'A' and b.estado = 'A' order by idNivel, idCiclo desc, a.nombre asc;");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grupos", $datos);
	break;
	case 'creportes':
		switch($objModulo->getAction()){
			case 'generarCuidados':
				require_once(getcwd()."/repositorio/pdf/cuidados.php");
				
				$obj = new RCuidados();
				$obj->generar($_POST['grupo']);
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
		}
	break;
}