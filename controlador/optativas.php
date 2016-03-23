<?php
global $objModulo;
switch($objModulo->getId()){
	case 'optativas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from ciclo where estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("ciclos", $datos);
	break;
	case 'listaOptativas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from optativa a");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaEstudiantesOptativa':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiante a join estudiantenivel b using(idEstudiante) join estudianteoptativa c using(idEstudiante) where idOptativa = ".$_GET['id']);
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'coptativas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOptativa();
				$obj->setId($_POST['id']);
				$obj->setCiclo($_POST['ciclo']);
				$obj->setNombre($_POST['nombre']);
				$obj->setResponsable($_POST['responsable']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TOptativa();
				$obj->setId($_POST['id']);
				
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'estudiantes':
				$db = TBase::conectaDB();
				
				$rs = $db->Execute("select * from estudiante a join estudiantenivel b using(idEstudiante) where (a.nombre like '%".$_GET['term']."%' or a.app like '%".$_GET['term']."%' or a.apm like '%".$_GET['term']."%' or concat(a.nombre, ' ', a.apm, ' ', a.apm) like '%".$_GET['term']."%' or concat(app, ' ', apm, ' ', a.nombre) like '%".$_GET['term']."%') and a.estado = 'A' and idEstudiante not in (select idEstudiante from estudianteoptativa where idOptativa = ".$_GET['id'].")");
				
				$datos = array();
				while(!$rs->EOF){
					$el = array();
					$el['id'] = $rs->fields['idEstudiante'];
					$el['label'] = $rs->fields['matricula'].' - '.$rs->fields['nombre'].' '.$rs->fields['app'].' '.$rs->fields['apm'];
					$el['identificador'] = $rs->fields['idEstudiante'];
					foreach($rs->fields as $key => $val)
						$el[$key] = $val;
						
					array_push($datos, $el);
					$rs->moveNext();
				}
				
				echo json_encode($datos);
			break;
			case 'addEstudiante':
				$obj = new TOptativa($_POST['id']);
				
				echo json_encode(array("band" => $obj->addEstudiante($_POST['estudiante'])));
			break;
			case 'delEstudiante':
				$obj = new TOptativa($_POST['id']);
				
				echo json_encode(array("band" => $obj->delEstudiante($_POST['estudiante'])));
			break;
		}
	break;
}