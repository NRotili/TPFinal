<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once('../../models/Alquileres.php');
require_once('../../models/Cliente.php');
require_once('../../models/Empleados.php');
require_once('../../models/Inventario.php');

$clientes = Cliente::all();
$empleados = Empleado::all();
$inventarios = Inventario::all();


if (isset($_POST['submit'])) {
    // $alquiler = new Alquileres();
    // $alquiler->fecha_alquiler = date("Y-m-d H:i:s");
    // $alquiler->id_inventario = $_POST['id_inventario'];
    // $alquiler->id_cliente = $_POST['id_cliente'];
    // $alquiler->id_empleado = $_POST['id_empleado'];
    // $alquiler->create();

// $alquiler->id_inventario = 367;
// $alquiler->id_cliente = 130;
// $alquiler->id_empleado = 1;
// $alquiler->create();
}

require_once('../../views/alquileres/create.view.php');

