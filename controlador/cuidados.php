<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaCuidados':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from cuidado");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ccuidados':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TCuidado();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TCuidado($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}