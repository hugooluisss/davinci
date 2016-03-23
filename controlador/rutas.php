<?php
global $objModulo;
switch($objModulo->getId()){
	case 'rutas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from ciclo where estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("ciclos", $datos);
	break;
	case 'listaRutas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from ruta a");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaEstudiantesRutas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiante a join estudiantenivel b using(idEstudiante) join estudianteruta c using(idEstudiante) where idRuta = ".$_GET['id']);
		
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'crutas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TRuta();
				$obj->setId($_POST['id']);
				$obj->setCiclo($_POST['ciclo']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TRuta();
				$obj->setId($_POST['id']);
				
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'estudiantes':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCiclo from ruta where idRuta = ".$_GET['id']);
				
				$rs = $db->Execute("select * from estudiante a join estudiantenivel b using(idEstudiante) where (a.nombre like '%".$_GET['term']."%' or a.app like '%".$_GET['term']."%' or a.apm like '%".$_GET['term']."%' or concat(a.nombre, ' ', a.apm, ' ', a.apm) like '%".$_GET['term']."%' or concat(app, ' ', apm, ' ', a.nombre) like '%".$_GET['term']."%') and a.estado = 'A' and idEstudiante not in (select idEstudiante from estudianteruta a join ruta b using(idRuta) where idCiclo = ".$rs->fields['idCiclo'].")");
				
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
				$obj = new TRuta($_POST['id']);
				
				echo json_encode(array("band" => $obj->addEstudiante($_POST['estudiante'])));
			break;
			case 'delEstudiante':
				$obj = new TRuta($_POST['id']);
				
				echo json_encode(array("band" => $obj->delEstudiante($_POST['estudiante'])));
			break;
		}
	break;
}