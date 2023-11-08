<?php

require_once '../../models/Conexion.php';

class Cliente extends Conexion {

    public $id_cliente, $id_almacen, $nombre, $apellidos, $email, $id_direccion, $activo, $fecha_creacion, $ultima_actualizacion;


    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM cliente ORDER BY nombre");
        $pre->execute();
        $res = $pre->get_result();

        $clientes = array();
        while ($cliente = $res->fetch_object(Cliente::class)) {
            array_push($clientes, $cliente);
        }

        return $clientes;
    }
}