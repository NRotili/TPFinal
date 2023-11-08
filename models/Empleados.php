<?php

require_once '../../Models/Conexion.php';

class Empleado extends Conexion {

    public $id_empleado, $nombre, $apellidos, $id_direccion, $imagen, $email, $id_almacen, $activo, $username, $password;

    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM empleado ORDER BY nombre");
        $pre->execute();
        $res = $pre->get_result();

        $empleados = array();
        while ($empleado = $res->fetch_object(Empleado::class)) {
            array_push($empleados, $empleado);
        }

        return $empleados;
    }

}