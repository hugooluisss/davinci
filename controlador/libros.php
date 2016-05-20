<?php
global $objModulo;
switch($objModulo->getId()){
	case 'libros':
		$db = TBase::conectaDB();
		$plan = new TPlanEstudios($_GET['plan']);
		
		$rs = $db->Execute("select a.* from grado a");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("editorial", $datos);
	break;
	case 'listaLibros':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as editorial from libro a join editorial b using(idEditorial)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'clibros':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TLibro();
				
				$obj->setId($_POST['id']);
				$obj->setEditorial($_POST['editorial']);
				$obj->setExistencias($_POST['existencias']);
				$obj->setPrecioLista($_POST['precioLista']);
				$obj->setPrecioVenta($_POST['precioVenta']);
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