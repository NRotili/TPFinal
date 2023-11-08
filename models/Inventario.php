<?php

require_once '../../Models/Conexion.php';
require_once '../../Models/Pelicula.php';

class Inventario extends Conexion {

    public $id_inventario, $id_pelicula, $id_almacen;

    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM inventario WHERE id_almacen = 1 ORDER BY id_inventario");
        $pre->execute();
        $res = $pre->get_result();

        $inventarios = array();
        while ($inventario = $res->fetch_object(Inventario::class)) {
            array_push($inventarios, $inventario);
        }

        return $inventarios;
    }

    //get Pelicula

    public function pelicula()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT titulo FROM pelicula WHERE id_pelicula = ?");
        $pre->bind_param("i", $this->id_pelicula);
        $pre->execute();
        $res = $pre->get_result();

        $pelicula = $res->fetch_object(Pelicula::class);

        return $pelicula;
    }




}