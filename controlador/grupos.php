<?php
global $objModulo;
switch($objModulo->getId()){
	case 'grupos':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from ciclo where estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("ciclos", $datos);
		
		$rs = $db->Execute("select a.*, b.nombre as nivel from grado a join nivel b using(idNivel)");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grados", $datos);
		$smarty->assign("anio", date("Y"));
		$smarty->assign("anio2", date("Y") - 10);
		$smarty->assign("mes", date("m"));
	break;
	case 'listaGrupos':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as ciclo, c.nombre as grado, d.nombre as nivel from grupo a join ciclo b using(idCiclo) join grado c using(idGrado) join nivel d using(idNivel) where b.estado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cgrupos':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TGrupo();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEstado($_POST['estado']);
				$obj->setCiclo($_POST['ciclo']);
				$obj->setGrado($_POST['grado']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TGrupo($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'listaAsistenciaPDF':
				require_once(getcwd()."/repositorio/pdf/asistencias.php");
				
				$obj = new RListaAsistencias($_POST['anio'], $_POST['mes'], $_POST['grupo']);
				$obj->generar();
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