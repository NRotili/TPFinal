<?php

class Pelicula extends Conexion {

    public $id_pelicula, $titulo, $descripcion, $anyo_lanzamiento, $id_idioma, $id_idioma_original, $duracion_alquiler, $rental_rate, $duracion, $replacement_cost, $clasificacion, $caracteristicas_especiales;

    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM pelicula ORDER BY titulo");
        $pre->execute();
        $res = $pre->get_result();

        $peliculas = array();
        while ($pelicula = $res->fetch_object(Peliculas::class)) {
            array_push($peliculas, $pelicula);
        }

        return $peliculas;
    }

    public static function find($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM pelicula WHERE id_pelicula = ?");
        $pre->bind_param("i", $id);
        $pre->execute();
        $res = $pre->get_result();

        $pelicula = $res->fetch_object(Peliculas::class);

        return $pelicula;
    }
}