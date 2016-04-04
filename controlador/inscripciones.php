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
		
		$rs = $db->Execute("select * from inscripcion a join estudiante b using(idEstudiante) where idGrupo = ".$_GET['grupo']);
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cinscripciones':
		switch($objModulo->getAction()){
			case 'estudiantes':
				$db = TBase::conectaDB();
				$rsGrupo = $db->Execute("select idNivel from grupo a join grado b using(idGrado) where idGrupo = ".$_GET['grupo']);
				
				$rs = $db->Execute("select * from estudiante a join estudiantenivel b using(idEstudiante) where (a.nombre like '%".$_GET['term']."%' or a.app like '%".$_GET['term']."%' or a.apm like '%".$_GET['term']."%' or concat(a.nombre, ' ', a.apm, ' ', a.apm) like '%".$_GET['term']."%' or concat(app, ' ', apm, ' ', a.nombre) like '%".$_GET['term']."%') and b.estado = 'A' and idEstudiante not in (select idEstudiante from inscripcion where idGrupo = ".$_GET['grupo'].") and b.idNivel = ".$rsGrupo->fields['idNivel']);
				
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
			case 'inscribir':
				$estudiante = new TEstudiante($_POST['estudiante']);
				echo json_encode(array("band" => $estudiante->inscribe($_POST['grupo'])));
			break;
			case 'setFolio':
				$db = TBase::conectaDB();
				
				$rs = $db->Execute("update inscripcion set folio = '".$_POST['folio']."' where idInscripcion = ".$_POST['inscripcion']);
				echo json_encode(array("band" => $rs?true:false));
			break;
			case 'delInscribir':
				$estudiante = new TEstudiante();
				echo json_encode(array("band" => $estudiante->desInscribe($_POST['inscripcion'])));
			break;
			case 'pdf':
				require_once(getcwd()."/repositorio/pdf/constancia.php");
				
				$obj = new RConstancia();
				$obj->generar($_GET['id']);
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