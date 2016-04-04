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
		
		$rs = $db->Execute("select * from grupoSanguineo");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("gruposSanguineos", $datos);
		
		$rs = $db->Execute("select * from cuidado");
		
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		
		$smarty->assign("cuidados", $datos);
	break;
	case 'listaEstudiantes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiante a left join estudiantenivel b using(idEstudiante) where a.estado = 'A' and b.estado = 'A'");
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
				$ultimoNivel = $obj->getUltimoNivel();
				
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
				$obj->setColonia($_POST['colonia']);
				
				if ($obj->guardar()){
					$obj->setCuidados(json_decode($_POST['cuidados']));
					
					if ($ultimoNivel != $_POST['nivel']){
						$nivel = new TNivel($_POST['nivel']);
						$nivel->generaMatricula($_POST['anio'], $obj->getId());
						
						echo json_encode(array("band" => true, "matricula" => $obj->getMatricula(), "identificador" => $obj->getId()));
					}else
						echo json_encode(array("band" => true, "matricula" => $obj->getMatricula(), "identificador" => $obj->getId()));
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
			case 'getData':
				$db = TBase::conectaDB();
				
				$rs = $db->Execute("select a.*, b.* from estudiante a join estudiantenivel b using(idEstudiante) where idEstudiante = ".$_POST['estudiante']." and b.estado = 'A'");
				$rs->fields['responsables'] = array();
				
				$aux = $db->Execute("select concat(nombre, ' ', app, ' ', apm) as nombre, idResponsable from responsableestudiante a join responsable b using(idResponsable) where idParentesco = 1 and idEstudiante = ".$_POST['estudiante']);
				$rs->fields['responsables']['papa'] = $aux->fields;
				
				$aux = $db->Execute("select concat(nombre, ' ', app, ' ', apm) as nombre, idResponsable from responsableestudiante a join responsable b using(idResponsable) where idParentesco = 2 and idEstudiante = ".$_POST['estudiante']);
				$rs->fields['responsables']['mama'] = $aux->fields;
				
				$aux = $db->Execute("select concat(nombre, ' ', app, ' ', apm) as nombre, idResponsable from responsableestudiante a join responsable b using(idResponsable) where idParentesco = 3 and idEstudiante = ".$_POST['estudiante']);
				$rs->fields['responsables']['tutor'] = $aux->fields;
				
				$aux = $db->Execute("select idCuidado from estudiantecuidados where idEstudiante = ".$_POST['estudiante']);
				$rs->fields['cuidados'] = array();
				
				while(!$aux->EOF){
					array_push($rs->fields['cuidados'], $aux->fields);
					$aux->moveNext();
				}
				
				echo json_encode($rs->fields);
			break;
			case 'changeMatricula':
				$obj = new TEstudiante($_POST['estudiante']);
				$db = TBase::conectaDB();
				
				echo json_encode(array("band" => $obj->setMatricula($_POST['matricula'])));
			break;
			case 'uploadfile':
				$extension = explode(".", $_FILES['upl']['name']);
				$extension = strtoupper($extension[count($extension) - 1]);
				
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 && $_POST['fotoEstudiante'] <> '' and $extension == 'JPG'){
					if (file_exists("repositorio/estudiantes/img_".$_POST['fotoEstudiante'].".".$extension)){
						if(!unlink("repositorio/estudiantes/img_".$_POST['fotoEstudiante'].".".$extension))
							echo '{"status":"error"}';
					}
					
					if(move_uploaded_file($_FILES['upl']['tmp_name'], "repositorio/estudiantes/img_".$_POST['fotoEstudiante'].".".$extension)){
						chmod("repositorio/estudiantes/img_".$_POST['fotoEstudiante'].".".$extension, 0777);
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'fichaPDF':
				require_once(getcwd()."/repositorio/pdf/fichaEstudiante.php");
				
				$obj = new RFichaEstudiante();
				$obj->generar($_GET['id']);
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
		}
	break;
}