<?php
global $objModulo;
switch($objModulo->getId()){
	case 'libros':
		$db = TBase::conectaDB();
		$plan = new TPlanEstudios($_GET['plan']);
		
		$rs = $db->Execute("select a.* from editorial a");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("editoriales", $datos);
		
		$rs = $db->Execute("select a.*, b.nombre as grado, c.nombre as nivel from asignatura a join grado b using(idGrado) join nivel c using(idNivel)");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("asignaturas", $datos);
	break;
	case 'listaLibros': case 'listaLibrosVender':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select a.*, b.nombre as editorial, c.nombre as asignatura from libro a join editorial b using(idEditorial) join asignatura c using(idAsignatura)");
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
				$obj->setAsignatura($_POST['asignatura']);
				$obj->setExistencias($_POST['existencias']);
				$obj->setPrecioLista($_POST['precioLista']);
				$obj->setPrecioVenta($_POST['precioVenta']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TLibro($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaClave':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idLibro from libro where clave = '".$_POST['txtClave']."' and not idLibro = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
		}
	break;
}