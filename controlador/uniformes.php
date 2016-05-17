<?php
global $objModulo;
switch($objModulo->getId()){
	case 'uniformes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from proveedor order by nombre");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("proveedores", $datos);
		
		
		$rs = $db->Execute("select * from tipoprenda order by nombre");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("tipos", $datos);
	break;
	case 'listaUniformes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from uniforme");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'listaTallasUniformes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select c.*, b.idUniforme from tipoprenda a join uniforme b using(idTipo) join talla c using(idTipo) where idUniforme = ".$_POST['uniforme']);
		$datos = array();
		while(!$rs->EOF){
			$aux = $db->Execute("select existencia from existencias where idUniforme = ".$_POST['uniforme']." and idTalla = ".$rs->fields['idTalla']);
			$rs->fields['cantidad'] = $aux->fields['existencia'];
			
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cuniformes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TUniforme();
				
				$obj->setId($_POST['id']);
				$obj->setProveedor($_POST['proveedor']);
				$obj->setTipo($_POST['tipo']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setPrecioLista($_POST['precioLista']);
				$obj->setPrecioVenta($_POST['precioVenta']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TUniforme($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaClave':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idUniforme from uniforme where clave = '".$_POST['txtClave']."' and not idUniforme = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
			case 'setExistencias':
				$obj = new TUniforme($_POST['uniforme']);
				
				echo json_encode(array("band" => $obj->setExistencias($_POST['talla'], $_POST['cantidad'])));
			break;
		}
	break;
}