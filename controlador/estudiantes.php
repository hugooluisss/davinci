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
		
		$rs = $db->Execute("select * from grupoSanguineo order by abbr");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("gruposSanguineos", $datos);
	break;
	case 'listaEstudiantes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiante where estado = 'A'");
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
				$obj = new TEstudiante();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setApp($_POST['app']);
				$obj->setApm($_POST['apm']);
				$obj->setCURP($_POST['curp']);
				$obj->setSexo($_POST['sexo']);
				$obj->setFechaNacimiento($_POST['nacimiento']);
				$obj->setEstadoNacimiento($_POST['estadoNac']);
				$obj->setCalle($_POST['calle']);
				$obj->setNumeroExterior($_POST['noExt']);
				$obj->setNumeroInterior($_POST['noInt']);
				$obj->setColonia($_POST['colonia']);
				$obj->setCodigoPostal($_POST['codigoPostal']);
				$obj->setDelegacion($_POST['delegacion']);
				$obj->setEstatura($_POST['estatura']);
				$obj->setPeso($_POST['peso']);
				$obj->setSanguineo($_POST['sanguineo']);
				
				if ($obj->guardar()){
					if ($_POST['id'] == ''){
						$nivel = new TNivel($_POST['nivel']);
						$nivel->generaMatricula($_POST['anio'], $obj->getId());
						
						echo json_encode(array("band" => true, "matricula" => $obj->getMatricula(), "identificador" => $obj->getId()));
					}else
						echo json_encode(array("band" => false));
				}else
					echo json_encode(array("band" => false, "mensaje" => "No se pudieron guardar los datos del estudiantes"));
			break;
			case 'del':
				$obj = new TEstudiante($_POST['id']);
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
			case 'setParentesco':
				$obj = new TEstudiante($_POST['estudiante']);
				echo json_encode(array("band" => $obj->setParentesco($_POST['parentesco'], $_POST['responsable'])));
			break;
		}
	break;
}