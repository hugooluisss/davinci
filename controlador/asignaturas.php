<?php
global $objModulo;
switch($objModulo->getId()){
	case 'asignaturas':
		$db = TBase::conectaDB();
		$plan = new TPlanEstudios($_GET['plan']);
		
		$rs = $db->Execute("select a.*, b.nombre as nivel from grado a join nivel b using(idNivel)");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grados", $datos);
		$smarty->assign("plan", $plan->getId());
		$smarty->assign("nombrePlan", $plan->getNombre());
	break;
	case 'listaAsignaturas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as grado, c.nombre as nivel from asignatura a join grado b using(idGrado) join nivel c using(idNivel)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'casignaturas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TAsignatura();
				
				$obj->setId($_POST['id']);
				$obj->setPlan($_POST['plan']);
				$obj->setGrado($_POST['grado']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TAsignatura($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}