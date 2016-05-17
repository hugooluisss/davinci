<?php
global $objModulo;
switch($objModulo->getId()){
	case 'tallas':
		$smarty->assign("tipo", $_GET['id']);
	break;
	case 'listaTallas': case 'listaTallasUniformes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from talla where idTipo = ".$_POST['tipo']);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ctallas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTalla();
				$obj->setId($_POST['id']);
				$obj->setTipo($_POST['tipo']);
				$obj->setNombre($_POST['nombre']);
				$obj->setAdicional($_POST['adicional']);

				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTalla($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>