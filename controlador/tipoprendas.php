<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaTipoPrendas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from tipoprenda");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cTipoPrendas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TTipoPrenda();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTipoPrenda($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}