<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPlanes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from planestudios");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cplanesestudio':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPlanEstudios();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setClave($_POST['clave']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPlanEstudios($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}