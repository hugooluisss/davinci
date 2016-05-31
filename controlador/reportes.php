<?php
global $objModulo;
switch($objModulo->getId()){
	case 'reportesEstudiantes':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select idGrupo, idNivel, a.nombre as grupo, b.nombre as ciclo, c.nombre as grado, d.nombre as nivel from grupo a join ciclo b using(idCiclo) join grado c using(idGrado) join nivel d using(idNivel) where a.estado = 'A' and b.estado = 'A' order by idNivel, idCiclo desc, a.nombre asc;");
		$datos = array();
		while(!$rs->EOF){
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("grupos", $datos);
	break;
	case 'creportes':
		switch($objModulo->getAction()){
			case 'generarCuidados':
				require_once(getcwd()."/repositorio/pdf/cuidados.php");
				
				$obj = new RCuidados();
				$obj->generar($_POST['grupo']);
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
			case 'generarListadoRutas':
				require_once(getcwd()."/repositorio/pdf/rutas.php");
				
				$obj = new RRutasEstudiantes();
				$obj->generar($_POST['grupo']);
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
			case 'generarInventarioUniformes':
				require_once(getcwd()."/repositorio/pdf/inventarioUniformes.php");
				
				$obj = new RInventario($_POST['preciolista'] == 'true');
				$obj->generar();
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
			case 'generarInventarioLibros':
				require_once(getcwd()."/repositorio/pdf/inventarioLibros.php");
				$obj = new RInventario($_POST['preciolista'] == 'true');
				$obj->generar();
				$documento = $obj->Output();
				
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);

				print json_encode($result);
			break;
			case 'generarVentas':
				require_once(getcwd()."/repositorio/pdf/ventas.php");
				
				$obj = new RVentas($_POST['inicio'], $_POST['fin']);
				$obj->generar();
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