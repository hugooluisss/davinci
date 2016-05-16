<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaProveedores':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from proveedor");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cproveedores':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TProveedor();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setEmail($_POST['email']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TProveedor($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}