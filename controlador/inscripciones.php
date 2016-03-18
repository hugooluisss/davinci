<?php
global $objModulo;
switch($objModulo->getId()){
	case 'inscripciones':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select idGrupo, idNivel, a.nombre as grupo, b.nombre as ciclo, c.nombre as grado, d.nombre as nivel from grupo a join ciclo b using(idCiclo) join grado c using(idGrado) join nivel d using(idNivel) where a.estado = 'A' and b.estado = 'A' order by idNivel, idCiclo desc, a.nombre asc;");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grupos", $datos);
	break;
	case 'listaInscripciones':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from inscripcion where idGrupo = ".$_GET['grupo']);
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grupos", $datos);
	break;
	case 'cinscripciones':
		switch($objModulo->getAction()){
			case 'estudiantes':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select * from estudiante a where a.nombre like '%".$_GET['term']."%'");
				
				$datos = array();
				while(!$rs->EOF){
					$el = array();
					$el['id'] = $rs->fields['idEstudiante'];
					$el['label'] = $rs->fields['nombre'].' '.$rs->fields['app'].' '.$rs->fields['apm'];
					$el['identificador'] = $rs->fields['idEstudiante'];
					foreach($rs->fields as $key => $val)
						$el[$key] = $val;
						
					array_push($datos, $el);
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
		}
	break;
}