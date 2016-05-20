<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaEditoriales':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from editorial");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ceditoriales':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEditorial();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setComentarios($_POST['comentarios']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TEditorial($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}