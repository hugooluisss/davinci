<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaVentasUniformes':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select a.*, b.* from venta a join responsable b using(idResponsable) where tipo = 1 and aplicada = 0 group by idVenta");
		$datos = array();
		while(!$rs->EOF){
			
			$objVenta = new TVenta($rs->fields['idVenta']);
			$rs->fields['monto'] = sprintf("%.2f", $objVenta->getMontoVenta());
			/*
			$rs->fields['saldo'] = sprintf("%.2f", $rs->fields['monto'] - $objVenta->getMontoPagos());
			*/
			$rs->fields['json']	= json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'listaMovimientos':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from movventa where idVenta = ".$_POST['venta']);
		$datos = array();
		$precio = 0;
		$existencias = true;
		while(!$rs->EOF){
			$el = json_decode($rs->fields['adicional']);
			$aux = $db->Execute("select existencia from uniforme a join existencias b using(idUniforme) where idUniforme = ".$el->idUniforme." and idTalla = ".$el->idTalla.";");
			
			$rs->fields['existencias'] = $aux->fields['existencia'] == ''?0:$aux->fields['existencia'];
			if ($rs->fields['existencias'] < $rs->fields['cantidad'])
				$existencias = false;
			
			$rs->fields['json']	= json_encode($rs->fields);
			$precio +=  $rs->fields['precio'];
			
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("bandExistencias", $existencias);
		$smarty->assign("total", sprintf("%.2f", $precio));
	break;
	case 'listaUniformesTalla':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select c.clave, c.nombre, b.nombre as talla, preciolista, precioventa+adicional as precioventa, idTalla, idUniforme from existencias a join talla b using(idTalla) join uniforme c using(idUniforme)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cventas':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TVenta($_POST['id']);
				global $userSesion;
				$obj->setFecha($_POST['fecha']);
				$obj->setResponsable($_POST['responsable']);
				$obj->setTipo($_POST['tipo']);
				
				if ($_POST['id'] == '')
					$obj->setUsuario($_POST['usuario'] == ''?$userSesion->getId():$_POST['usuario']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => "true", "id" => $obj->getId()));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'addMovimiento':
				$obj = new TMovimiento($_POST['id']);
				
				$obj->setVenta($_POST['venta']);
				$obj->setClave($_POST['clave']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setCantidad($_POST['cantidad']);
				$obj->setPrecio($_POST['precio'] * $_POST['cantidad']);
				$obj->setAdicional($_POST['adicional']);
				
				if ($obj->guardar() == true)
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false", "mensaje" => "No se guardó"));
			break;
			case 'del':
				$obj = new TVenta($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'delMovimiento':
				$obj = new TMovimiento($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'aplicar':
				$obj = new TVenta($_POST['venta']);
				
				if ($obj->aplicar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
		}
	break;
}
?>