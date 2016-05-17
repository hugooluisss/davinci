<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaResponsablesEstudiante': case 'responsablesVenta':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select distinct a.*, concat(c.nombre, ' ', c.app, ' ', c.apm) as estudiante from responsable a join responsableestudiante b using(idResponsable) join estudiante c using(idEstudiante)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cresponsables':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TResponsable();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setApp($_POST['app']);
				$obj->setApm($_POST['apm']);
				$obj->setOcupacion($_POST['ocupacion']);
				$obj->setEmpresa($_POST['empresa']);
				$obj->setTelefono($_POST['telefono']);
				$obj->setExtension($_POST['extension']);
				$obj->setTelefonoContacto($_POST['telefonoContacto']);
				$obj->setCelular($_POST['celular']);
				$obj->setCorreo($_POST['correo']);
				$obj->setPuesto($_POST['puesto']);
				
				echo json_encode(array("band" => $obj->guardar(), "identificador" => $obj->getId()));
			break;
			case 'del':
				$obj = new TResponsable($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}