<?php
global $objModulo;
switch($objModulo->getId()){
	case 'niveles':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from nivel");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cniveles':
		switch($objModulo->getAction()){
			case 'update':
				$db = TBase::conectaDB();
				
				$obj = new TNivel();
				
				$obj->setId($_POST['id']);
				$obj->setConsecutivo($_POST['consecutivo']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
		}
	break;
}