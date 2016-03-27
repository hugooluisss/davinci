<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPermisos':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from permiso where idEstudiante = ".$_GET['estudiante']." order by fecha desc");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cpermisos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPermiso();
				
				$obj->setId($_POST['id']);
				$obj->setDias($_POST['dias']);
				$obj->setFecha($_POST['fecha']);
				$obj->setEstudiante($_POST['estudiante']);
				$obj->setComentario($_POST['comentario']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPermiso($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}