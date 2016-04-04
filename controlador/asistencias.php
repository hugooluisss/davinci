<?php
global $objModulo;
switch($objModulo->getId()){
	case 'asistencias':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from estudiante a join inscripcion b using(idEstudiante)where idGrupo = ".$_POST['grupo']." order by app, apm, nombre");
		$datos = array();
		while(!$rs->EOF){
			$aux = $db->Execute("select idInscripcion from asistencia where idInscripcion = ".$rs->fields['idInscripcion']." and fecha = '".$_POST['fecha']."'");
			$rs->fields['asistio'] = !$aux->EOF;
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("fecha", $_POST['fecha']);
	break;
	case 'casistencias':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEstudiante();
				
				echo json_encode(array("band" => $obj->addAsistencia($_POST['inscripcion'], $_POST['fecha'])));
			break;
			case 'del':
				$obj = new TEstudiante();
				
				echo json_encode(array("band" => $obj->dropAsistencia($_POST['inscripcion'], $_POST['fecha'])));
			break;
		}
	break;
}