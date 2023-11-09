<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once('../../models/Alquileres.php');
require_once('../../models/Cliente.php');
require_once('../../models/Empleados.php');
require_once('../../models/Inventario.php');

$clientes = Cliente::all();
$empleados = Empleado::all();
$inventarios = Inventario::all();


if (isset($_POST['enviar'])) {


    $detalles = $_POST['item'];

    for($i=0; $i<count($detalles['code']); $i++){
        $alquiler = new Alquileres();
        $alquiler->id_inventario = $detalles['code'][$i];
        $alquiler->fecha_alquiler = $detalles['fechaalquiler'][$i];
        $alquiler->fecha_devolucion = $detalles['fechadevolucion'][$i];
        $alquiler->id_cliente = $_POST['id_cliente'];
        $alquiler->id_empleado = $_POST['id_empleado'];
        $alquiler->create();
    }
}

require_once('../../views/alquileres/create.view.php');

