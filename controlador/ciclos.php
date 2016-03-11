<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaCiclos':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from ciclo");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ccicloescolar':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TCiclo();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEstado($_POST['estado']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TCiclo($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}