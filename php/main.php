<?php
include_once 'conexion.php';
include_once 'login.php';
// include_once 'modulo_trabajo_social.php';
// include_once 'modulo_estatus.php';
// include_once 'estado.php';
// include_once 'admision_hospitalaria.php';
// $modulo_social=new modulo_trabajo_social();
// $modulo_estatus=new modulo_estatus();

// $estado= new estado();
// $admision_hospitalaria= new admision_hospitalaria();
// extract($_REQUEST);

// $debug = var_export($_POST, true);
// echo json_encode(array('debug' => $debug));

// echo var_dump($_POST);

$errors = [];
$data = [];

if (empty($_POST['usuario'])) {
    $errors['usuario'] = 'usuario is required.';
} else {
    $usuario = $_POST['usuario'];
}

if (empty($_POST['password'])) {
    $errors['pasword'] = 'password is required.';
} else {
    $password = $_POST['password'];
}

if (empty($_POST['opcion'])) {
    $errors['opcion'] = 'opcion is required.';
} else {
    $opcion = $_POST['opcion'];
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
    
}

// echo json_encode($_POST['usuario']);

// $opcion = $_POST['opcion'] ?? null;
// echo $opcion;

$login = new login();


 switch ($opcion) { 
//     case 'BUSCARNOEXP': $admision_hospitalaria->buscarNoExp();       break;
//     case 'VERIFICAREXPEDIENTE': $admision_hospitalaria->verificarExpediente($NoExp);       break;
//     case 'CONSULTAR_PERIODO_CONSULTA': $admision_hospitalaria->tablasPorPeriodos();       break;
//     case 'ELIMINAREXP': $admision_hospitalaria->eliminarExp($id); break;
//      case 'ELIMINAREXP2': $admision_hospitalaria->eliminarExp2($id); break;
//     case 'ACTUALIZAREXP': $admision_hospitalaria->actualizar();    break;
//     case 'BUSCARPACIENTE': $admision_hospitalaria->seleccionarPaciente();    break;
//     case 'BUSCARPACIENTE2': $admision_hospitalaria->seleccionarPaciente2();    break;
//     case 'CONSULTAR_CITAS':$admision_hospitalaria->tablaCitas();       break;
//     case 'MOSTRARMUNICIPIO':  $estado->HTMLMunicipios($id);     break;
//     case 'GUARDARCITAADMIN': $admision_hospitalaria->guardar_cita();    break;
//     case 'GUARDARPACIENTEADMIN': $admision_hospitalaria->guardar_paciente();   break;
//     case 'GUARDAR_PACIENTE_ESE': $modulo_social->guardar_paciente2(); break;
    case 'iniciar_sesion':
        if ($login !== null){
            $login->iniciarSesion($usuario, $password); 
        }else { echo 'login es null'; }
        break;
//     case 'CERRAR_SESION': $login->cerrarSesion(); break;
//     case 'CONSULTAR_PACIENTE_TS': $modulo_social->consultar_paciente_ts($id); break;
//     case 'GUARDAR_USUARIO' : $login->nuevo_usuario();break;  
//     case 'CONSULTAR_USUARIO': $login->consultar_usuario($id);break;
//     case 'GUARDAR_USUARIO' : $login->nuevo_usuario();break;
//     case 'HABILITAR_USUARIO' : $login->habilitar($id,$estatus);break;  
//     case 'consulta_diagnostico': $modulo_social-> consulta_diagnostico($id); break;
//     case 'EGRESO_FAMILIAR': $modulo_social->egreso_familiar(); break;
//     case 'GUARDAR_VIVIENDA': $modulo_social->guardar_vivienda(); break;
//     case 'GUARDAR_SALUD_FAMILIAR': $modulo_social->guardar_salud_familiar();  break;
//     case 'GUARDAR_PUNTOS_GRAL':  $modulo_social->guardar_puntos_gral();   break;
//     case 'ELIMINAR_PACIENTES':  $modulo_social->eliminar_pacientes($id);   break; 
//     case 'GUARDAR_OCUPACION':  $modulo_social-> guardar_ocupacion();   break;
//     case 'CONSULTAR_GRAFICA_ESCALA_CALIFICACION' : $modulo_social->consultar_grafica_escala_calificacion();break;
//     case 'CONSULTAR_GRAFICA_ESCALA_INGRESO' : $modulo_social->consultar_unidades_ingreso(); break;
//     case 'INGRESO_EXTERNO' : $modulo_social->ingreso_externo(); break;
//     case 'ELIMINAR_EGRESO':  $modulo_social->eliminar_egreso($id_egreso);   break; 
//     case 'ELIMINAR_ESEF':  $modulo_social->eliminar_esef($id);   break;
//     case 'CONSULTAR_PACIENTES_URL' : $modulo_social->consultar_pacientes_url($id_unidad);break;
//     case 'CONSULTAR_PACIENTES_EXTERNOS_URL' : $modulo_social->consultar_pacientes_externos_url($id_unidad2);break;
//     case 'CONSULTAR_ESTUDIOLOCAL_URL' : $modulo_social->consultar_estudioslocales_url($id_unidad3);break;
//     case 'CONSULTAR_ESTUDIOEXTERNOS_URL' : $modulo_social->consultar_estudiosexternos_url($id_unidad4);break;
//     case 'CONSULTAR_PACIENTE_PODERACION': $modulo_social-> consultar_paciente_poderacion($id); break;
//     case 'TRASPASO_DATOS': $modulo_social-> traspaso_datos($id); break;
//     case 'CONSULTAR_PACIENTE_TS2': $modulo_social->consultar_paciente_poderacion($id); break;
//     case 'CONSULTAR_ESTUDIOLOCAL_DETALLE' : $modulo_social->consultar_estudioslocales_detalle($id_u,$curp,$folio_sp);break;
//     case 'GUARDAR_SERVICIO': $modulo_estatus->guardar_servicio();break;
//     case 'ELIMINAR_SERVICIO': $modulo_estatus->eliminar_servicio($id); break; 
//     case 'GUARDAR_CAMA': $modulo_estatus->guardar_cama();break;
//     case 'ELIMINAR_CAMA': $modulo_estatus->eliminar_cama($id); break; 
//     case 'CONSULTAR_CAMA': $modulo_estatus->consultar_cama(); break; 
//     case 'HABILITAR_CAMA': $modulo_estatus->habilitar_cama($id); break; 
//     case 'DESHABILITAR_CAMA': $modulo_estatus->deshabilitar_cama($id); break; 
//     case 'GUARDAR_UBICACION': $modulo_estatus->guardar_ubicacion();break;
//     case 'ELIMINAR_UBICACION': $modulo_estatus->eliminar_ubicacion($id); break; 
//     case 'CONSULTAR_CAMAS':   $modulo_estatus->consultar_camas_disponibles(); break; 
//     case 'guardar_paciente2': $modulo_estatus->guardar_paciente(); break; 
//     case 'CONSULTAR_PACIENTE_PANTALLA': $modulo_social->cpp($id); break;
//     case 'CONSULTAR_CAMAS':   $modulo_estatus->consultar_camas_disponibles(); break; 
//     case 'C_PACIENTES_PANTALLA' : $modulo_estatus->consultar_pacientes($id_unidad);break;
//     case 'C_ESTUDIOLOCAL_URL' : $modulo_social->c_estudioslocales_url($id_unidad3);break;
//     case  'C_E_DETALLE' : $modulo_social->c_e_detalle($id_u,$curp,$folio_sp);break;
//     case 'GUARDAR_MARQUE' : $modulo_estatus->guardar_marque($id_unidad,$marquetex);break;
	default: break;

   } 

?>