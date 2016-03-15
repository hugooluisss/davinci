<?php
global $objModulo;
switch($objModulo->getId()){
	case 'estudiantes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from estado where activo = 1 order by nombre");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("estados", $datos);
		$smarty->assign("anio", date("Y"));
		$smarty->assign("anio2", date("Y")-10);
		
		$rs = $db->Execute("select * from nivel order by idNivel");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("nivel", $datos);
	break;
	case 'listaEstudiantes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiantes where idEstado = 'A'");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cestudiantes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				
				$obj = new TCuidado();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setDescripcion($_POST['descripcion']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TCuidado($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'calcularMatricula':
				$db = TBase::conectaDB();
				$objNivel = new TNivel($_POST['nivel']);

				$nivel = $objNivel->getInicial();
				$ingreso = $_POST['ingreso'];
				$sexo = $_POST['genero'];
				$consecutivo = $objNivel->siguiente(false);
				
				if ($nivel == '' or $ingreso == '' or $sexo == '' or $consecutivo == '')
					echo json_encode(array("band" => false));
				else
					echo json_encode(array("band" => true, "matricula" => strtoupper($nivel.$ingreso.$sexo.sprintf("%05s", $consecutivo))));
			break;
		}
	break;
}